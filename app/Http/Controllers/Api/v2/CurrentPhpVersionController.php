<?php

namespace App\Http\Controllers\Api\v2;

use App\Managers\PhpVersionManager;
use App\Http\Controllers\Controller;
use App\Transformers\Api\v2\CurrentPhpVersionTransformer;
use App\Transformers\Api\v2\HostTransformer;
use Illuminate\Http\Response;

class CurrentPhpVersionController extends Controller
{
    /** @var PhpVersionManager */
    private $versionManager;

    /** @var Response */
    private $response;

    /** @var HostTransformer */
    private $transformer;

    public function __construct(PhpVersionManager $versionManager, Response $response, CurrentPhpVersionTransformer $transformer)
    {
        $this->versionManager = $versionManager;
        $this->response = $response;
        $this->transformer = $transformer;
    }

    public function index()
    {
        $hosts = $this->versionManager->getCurrentVersionSupportedHosts();

        $etag = md5($hosts);

        return $this->response
            ->setStatusCode(200)
            ->setEtag($etag)
            ->setContent(
                fractal($hosts)
                    ->transformWith($this->transformer)
                    ->includeCurrentVersionEvent()
                    ->toArray()
            );
    }
}
