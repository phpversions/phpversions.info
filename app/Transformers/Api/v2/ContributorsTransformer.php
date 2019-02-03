<?php

declare(strict_types=1);

namespace App\Transformers\Api\v2;

use App\Dto\Contributor;
use League\Fractal\TransformerAbstract;

class ContributorsTransformer extends TransformerAbstract
{
    public function transform(Contributor $github) : array
    {
        return [
            'user' => $github->getUsername(),
            'repo' => $github->getRepoUrl(),
            'image' => $github->getAvatar()
        ];
    }
}