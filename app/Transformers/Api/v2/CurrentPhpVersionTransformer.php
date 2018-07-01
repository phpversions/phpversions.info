<?php

namespace App\Transformers\Api\v2;


use App\Models\Host;
use League\Fractal\TransformerAbstract;

class CurrentPhpVersionTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'currentVersionEvent'
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Host $host)
    {
        return [
            'host' => $host->getName(),
            'url' => $host->getUrl(),
            'scannedAt' => $host->getUpdatedAt(),
        ];
    }

    public function includeCurrentVersionEvent(Host $host)
    {
        if (!$host->event) {
            return $this->null();
        }

        return $this->item($host->event, new CurrentVersionEventTransformer());
    }
}
