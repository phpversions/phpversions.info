<?php

namespace App\Transformers\Api\v2;

use App\Models\HostEvent;
use League\Fractal\TransformerAbstract;

class CurrentVersionEventTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(HostEvent $event)
    {
        return [
            'version' => $event->getSemver(),
        ];
    }
}
