<?php

namespace App\Console\Commands;

use App\Models\Vulnerability;
use App\Repositories\VulnerabilityRepository;
use App\Services\CveManager;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Log\Logger;

class CveCheckCommand extends Command
{
    protected $signature = 'cve:check';

    protected $description = 'Check CVE list for vulnerabilities';

    /** @var CveManager */
    private $manager;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CveManager $manager)
    {
        parent::__construct();
        $this->manager = $manager;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() : void
    {
        $this->info('Getting latest CVE threats for PHP');

        $start = microtime(true);

        $this->manager->readCveData();

        $end = microtime(true);

        $time = ($end - $start);
        echo "\r\n";
        echo "\r\n";
        $this->info(sprintf('It took %s seconds to check for php related cve threats', round($time, 2)));
    }
}
