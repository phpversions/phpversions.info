<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Host;
use Illuminate\Support\Collection;

class CurrentPhpVersionRepository
{
    private const LATEST_VERSION = 72;

    private const DEPRECATED_VERSIONS = [
        '56',
        '55',
        '54',
        '53',
        '52'
    ];

    public function __construct(Host $host)
    {
        $this->host = $host;
    }

    public function findCurrentPhpVersionHosts() : Collection
    {
        return $this->host->whereHas('events', function ($query) {
            $query->byVersion(self::LATEST_VERSION);
        })->with(['event' => function ($query) {
            $query->byVersion(self::LATEST_VERSION);
        }])->get();
    }

    public function findDeprecatedPhpVersionHosts()
    {
        $hosts = [];

        foreach(self::DEPRECATED_VERSIONS as $version) {
           $hosts[] = $this->host->whereHas('events', function ($query) {
                $query->byVersion(self::LATEST_VERSION);
            })->get();
        }

        return $hosts;
    }
}