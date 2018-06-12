<?php

declare(strict_types=1);


namespace App\Repositories;

use App\Models\Host;
use Illuminate\Database\Eloquent\Collection;

class CurrentPhpVersionRepository
{
    private const VERSION = '72';

    public function __construct(Host $host)
    {
        $this->host = $host;
    }

    public function findCurrentPhpVersionHosts() : Collection
    {
        $hosts = $this->host->all();

        return $hosts->each(function ($host) {
            return $host->events()->byCurrentVersion(self::VERSION)->get();
        });
    }
}