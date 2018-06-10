<?php

namespace App\Console\Commands;

use App\Repositories\DistributionRepository;
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

    /** @var DistributionRepository */
    protected $distributionRepository;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(DistributionRepository $distributionRepository)
    {
        parent::__construct();

        $this->distributionRepository = $distributionRepository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() : void
    {
        $start = microtime(true);

        $data = file_get_contents(__DIR__ . '/../../../data/operating_systems.yml');

        $parsedData = Yaml::parse($data, Yaml::PARSE_OBJECT_FOR_MAP);

        $count = count($parsedData);

        foreach($parsedData as $data) {
            $this->distributionRepository->create($data);
        }

        $end = microtime(true);

        $time = ($end - $start);

        Log::info(sprintf('Imported %s distribution records in %s seconds', $count, $time));
    }
}
