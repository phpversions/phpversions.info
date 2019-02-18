<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Distribution;
use App\Models\DistributionEvent;
use App\Repositories\DistributionRepository;
use Symfony\Component\Yaml\Yaml;

class OperatingSystemManager
{
    /** @var DistributionRepository */
    protected $distributionRepository;

    public function __construct(DistributionRepository $distributionManager)
    {
        $this->distributionRepository = $distributionManager;
    }

    public function readOperatingSystemData() : int
    {
        $data = file_get_contents(__DIR__ . '/../../data/operating_systems.yml');

        $this->truncateData();
        $this->truncateEventsData();

        $parsedData = Yaml::parse($data, Yaml::PARSE_OBJECT_FOR_MAP);

        $count = count($parsedData);

        foreach($parsedData as $data) {
            $this->distributionRepository->create($data);
        }

        return $count;
    }

    private function truncateData() : void
    {
        Distribution::truncate();
    }

    private function truncateEventsData() : void
    {
        DistributionEvent::truncate();
    }
}