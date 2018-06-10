<?php

namespace App\Models\Interfaces;

interface Hostable
{
    public function setId(int $id);

    public function getId() : int;

    public function setName(string $name);

    public function getName() : string;

    public function setUrl(string $url);

    public function getUrl() : string;
}