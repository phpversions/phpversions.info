<?php

namespace App\Transformers\Api\v2;

use App\Models\HostEvent;
use League\Fractal\TransformerAbstract;

class EventsTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(HostEvent $event)
    {
        return [
            'default' => $event->getDefaultPhpVersion(),
            'semver' => $event->getSemver(),
            'hostType' => $event->getHostType(),
        ];
    }
}
