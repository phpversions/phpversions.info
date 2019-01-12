<?php

declare(strict_types=1);

namespace App\Transformers\Api\v2;

use App\Models\Vulnerability;
use League\Fractal\TransformerAbstract;

class VulnerabilitiesTransformer extends TransformerAbstract
{
    private const CVE_BASE_URL = 'https://cve.mitre.org/cgi-bin/cvekey.cgi?keyword=';

    public function transform(Vulnerability $vulnerability) : array
    {
        return [
            'id' => $vulnerability->getId(),
            'threat' => $vulnerability->getRisk(),
            'cveId' => $vulnerability->getCveId(),
            'summary' => $vulnerability->getSummary(),
            'versions' => $vulnerability->getVersions(),
            'cveLink' => self::CVE_BASE_URL . $vulnerability->getCveId(),
        ];
    }
}
