<?php

namespace App\Console\Commands;

use App\Repositories\DistributionRepository;
use App\Services\OperatingSystemManager;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Yaml\Yaml;

class ReadOperatingSystemDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:operating-systems';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import data from the operating_systems.yml file nightly';

    /** @var OperatingSystemManager */
    protected $operatingSystemManager;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(OperatingSystemManager $operatingSystemManager)
    {
        parent::__construct();

        $this->operatingSystemManager = $operatingSystemManager;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() : void
    {
        $this->info('Reading from Operating Systems data');

        $start = microtime(true);

        $count = $this->operatingSystemManager->readOperatingSystemData();

        $end = microtime(true);

        $time = ($end - $start);

        $this->info(sprintf('Imported %s distribution records in %s seconds', $count, $time));

        Log::info(sprintf('Imported %s distribution records in %s seconds', $count, $time));
    }
}
