<?php

declare(strict_types=1);

namespace App\Dto;

class Contributor
{
    /** @var string */
    private $username;

    /** @var string */
    private $repoUrl;

    /** @var string */
    private $avatar;

    public function setUsername(string $username) : void
    {
        $this->username = $username;
    }

    public function getUsername() : string
    {
        return $this->username;
    }

    public function setRepoUrl(string $repoUrl) : void
    {
        $this->repoUrl = $repoUrl;
    }

    public function getRepoUrl() : string
    {
        return $this->repoUrl;
    }

    public function setAvatar(string $avatar) : void
    {
        $this->avatar = $avatar;
    }

    public function getAvatar() : string
    {
        return $this->avatar;
    }
}