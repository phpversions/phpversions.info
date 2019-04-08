<?php

declare(strict_types=1);

namespace App\Dto;

class Version
{
    /** @var string */
    private $version;

    public function setVersion(string $version) : void
    {
        $this->version = $version;
    }

    public function getVersion() : ? string
    {
        return $this->version ?? null;
    }
}