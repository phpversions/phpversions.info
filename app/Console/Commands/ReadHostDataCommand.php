<?php

namespace App\Console\Commands;

use App\Models\Host;
use App\Repositories\HostRepository;
use App\Services\HostManager;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Monolog\Logger;
use Symfony\Component\Yaml\Yaml;

class ReadHostDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:hosts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import data from the hosts.yml file nightly';

    /** @var HostRepository */
    protected $hostManager;

    public function __construct(HostManager $hostManager)
    {
        parent::__construct();

        $this->hostManager = $hostManager;
    }
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() : void
    {
        $start = microtime(true);

        $this->info('Importing host data from hosts.yml file');

        $count = $this->hostManager->readBaseHostData();

        $end = microtime(true);

        $time = ($end - $start);

        $this->info(sprintf('Imported %s hosting records in %s seconds', $count, $time));

        Log::info(sprintf('Imported %s hosting records in %s seconds', $count, $time));
    }
}
