<?php

namespace App\Console\Commands;

use App\Models\Vulnerability;
use App\Repositories\VulnerabilityRepository;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Log\Logger;

class CveCheckCommand extends Command
{
    protected $signature = 'cve:check';

    protected $description = 'Check CVE list for vulnerabilities';

    /** @var VulnerabilityRepository */
    private $vulnerabilityRepository;

    /** @var Client */
    private $client;

    /** @var Logger */
    private $logger;

    private $endpoint = 'https://raw.githubusercontent.com/psecio/versionscan/master/src/Psecio/Versionscan/checks.json';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(VulnerabilityRepository $vulnerabilityRepository, Client $client, Logger $logger)
    {
        parent::__construct();
        $this->vulnerabilityRepository = $vulnerabilityRepository;
        $this->client = $client;
        $this->logger = $logger;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() : void
    {
        $checks = $this->client->request('GET', $this->endpoint);

        if ($checks->getStatusCode() >= 400) {
            $this->logger->error(sprintf(
                'CVE Checks failed. Response Code: %s. Response Body: %s',
                    $checks->getStatusCode(),
                    $checks->getBody()
            ));

            return;
        }

        $vulnerabilties = json_decode($checks->getBody(), true);

        foreach ($vulnerabilties as $threats) {
            Vulnerability::truncate();
            $start = microtime(true);
            $this->info(sprintf('There are %s vulnerabilities being read', count($threats)));
            echo "\r\n";
            $bar = $this->output->createProgressBar(count($threats));
            foreach ($threats as $threat) {
                $this->vulnerabilityRepository->create($threat);
                $bar->advance();
            }

            $end = microtime(true);
            $bar->finish();

            $time = ($end - $start);
            echo "\r\n";
            echo "\r\n";
            $this->info(sprintf('It took %s seconds to check for php related cve threats', round($time, 2)));
        }
    }
}
