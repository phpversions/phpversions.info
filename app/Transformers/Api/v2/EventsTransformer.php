<?php

declare(strict_types=1);

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
    public function transform(HostEvent $event) : array
    {
        return [
            'type'                  => $event->getHostType(),
            'id'                    => $event->getId(),
            'default'               => $event->getDefaultPhpVersion(),
            'semver'                => $event->getSemver(),
            'hostType'              => $event->getHostType(),
            'hostId'                => $event->getHostId(),
            'supportedVersions'     => $event->getSupportedVersions($event->getHostId()),
            'securityVersions'      => $event->getSecurityVersions($event->getHostId()),
            'eolVersions'           => $event->getEolVersions($event->getHostId()),
        ];
    }
}
