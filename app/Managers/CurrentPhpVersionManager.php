<?php

declare(strict_types=1);

namespace App\Managers;

use App\Repositories\CurrentPhpVersionRepository;
use Illuminate\Database\Eloquent\Collection;

class CurrentPhpVersionManager
{
    /** @var CurrentPhpVersionRepository */
    private $repository;

    public function __construct(CurrentPhpVersionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getCurrentVersionSupportedHosts() : Collection
    {
        return $this->repository->findCurrentPhpVersionHosts();
    }
}