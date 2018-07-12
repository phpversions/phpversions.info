<?php

namespace App\Http\Controllers\Api\v2;

use App\Repositories\DistributionRepository;
use App\Transformers\Api\v2\OperatingSystemTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class OperatingSystemsController extends Controller
{
    /** @var Response */
    private $response;

    /** @var OperatingSystemTransformer */
    private $operatingSystemTransformer;

    /** @var DistributionRepository */
    private $distributionRepository;

    public function __construct(
        Response $response,
        OperatingSystemTransformer $operatingSystemTransformer,
        DistributionRepository $distributionRepository
    ) {
        $this->response = $response;
        $this->operatingSystemTransformer = $operatingSystemTransformer;
        $this->distributionRepository = $distributionRepository;
    }

    public function index() : Response
    {
        $operatingSystems = $this->distributionRepository->get();

        $etag = md5($operatingSystems);

        return $this->response
            ->setEtag($etag)
            ->setStatusCode(200)
            ->setContent(
                fractal($operatingSystems)->transformWith($this->operatingSystemTransformer)->toArray()
            );
    }
}
