<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Host;
use App\Models\HostEvent;
use App\Repositories\HostRepository;
use Symfony\Component\Yaml\Yaml;

class HostManager
{
    /** @var HostRepository */
    protected $hostRepository;

    protected $readHosts = [];

    public function __construct(HostRepository $hostRepository)
    {
        $this->hostRepository = $hostRepository;
    }

    public function readBaseHostData() : int
    {
        $data = file_get_contents(__DIR__ . '/../../data/hosts.yml');

        $parsedData = Yaml::parse($data, Yaml::PARSE_OBJECT_FOR_MAP);

        $count = count($parsedData);

        $this->truncateHostData();
        $this->truncateHostEventData();

        foreach($parsedData as $data) {
            $this->hostRepository->create($data);
        }

        return (int) $count;
    }

    public function readRemoteHostData()
    {
        //
    }

    private function truncateHostData() : void
    {
        Host::truncate();
    }

    private function truncateHostEventData() : void
    {
        HostEvent::truncate();
    }

}