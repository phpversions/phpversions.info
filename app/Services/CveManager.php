<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Vulnerability;
use App\Repositories\VulnerabilityRepository;
use GuzzleHttp\Client;
use Illuminate\Log\Logger;
use Psr\Http\Message\ResponseInterface;

class CveManager
{
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
    public function __construct(VulnerabilityRepository $vulnerabilityManager, Client $client, Logger $logger)
    {
        $this->vulnerabilityRepository = $vulnerabilityManager;
        $this->client = $client;
        $this->logger = $logger;
    }

    public function readCveData()
    {
        $checks = $this->client->request('GET', $this->endpoint);

        if ($checks->getStatusCode() >= 400) {
            $this->logError($checks);
        }

        $vulnerabilties = json_decode($checks->getBody()->getContents(), true);

        $this->truncateData();

        foreach ($vulnerabilties as $threats) {

            foreach ($threats as $threat) {
                $this->vulnerabilityRepository->create($threat);
            }
        }

        return count($vulnerabilties);
    }

    private function truncateData() : void
    {
        Vulnerability::truncate();
    }

    private function logError(ResponseInterface $checks) : void
    {
        $this->logger->error(sprintf(
            'CVE Checks failed. Response Code: %s. Response Body: %s',
            $checks->getStatusCode(),
            $checks->getBody()
        ));

        return;
    }
}