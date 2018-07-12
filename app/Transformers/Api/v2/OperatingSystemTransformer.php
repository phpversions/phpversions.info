<?php

namespace App\Transformers\Api\v2;

use App\Models\Distribution;
use League\Fractal\TransformerAbstract;

class OperatingSystemTransformer extends TransformerAbstract
{
    public function transform(Distribution $distribution) : array
    {
        return [
            'distribution' => $distribution->getName(),
            'url' => $distribution->getUrl(),
            'family' => $distribution->event->getFamily(),
            'default' => $distribution->event->getDefaultPhpVersion(),
            'lastScanned' => $distribution->getLastScanned(),
        ];
    }
}
