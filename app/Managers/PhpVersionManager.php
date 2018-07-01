<?php

declare(strict_types=1);

namespace App\Managers;

use App\Repositories\CurrentPhpVersionRepository;
use Illuminate\Support\Collection;

class PhpVersionManager
{
    /** @var CurrentPhpVersionRepository */
    private $repository;

    public function __construct(CurrentPhpVersionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getCurrentVersionSupportedHosts()
    {
        return $this->repository->findCurrentPhpVersionHosts();
    }
}