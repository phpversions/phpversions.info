<?php

namespace App\Console\Commands;

use App\Models\Host;
use App\Repositories\HostRepository;
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
    protected $hostRepository;

    public function __construct(HostRepository $hostRepository)
    {
        parent::__construct();

        $this->hostRepository = $hostRepository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() : void
    {
        $start = microtime(true);

        $data = file_get_contents(__DIR__ . '/../../../data/hosts.yml');

        $parsedData = Yaml::parse($data, Yaml::PARSE_OBJECT_FOR_MAP);

        $count = count($parsedData);

        foreach($parsedData as $data) {
            $this->hostRepository->create($data);
        }

        $end = microtime(true);

        $time = ($end - $start);

        Log::info(sprintf('Imported %s hosting records in %s seconds', $count, $time));
    }
}
