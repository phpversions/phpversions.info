<?php

namespace App\Transformers\Api\v2;

use App\Models\Host;
use League\Fractal\TransformerAbstract;

class HostTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'events',
    ];

    public function transform(Host $host)
    {
        return [
            'host' => $host->getName(),
            'url' => $host->getUrl(),
            'default' => $host->getDefaultPhpVersion(),
            'scannedAt' => $host->getUpdatedAt(),
        ];
    }

    public function includeEvents(Host $host)
    {
        if (!$host->events) {
            return $this->null();
        }

        return $this->collection($host->events, new EventsTransformer);
    }
}
