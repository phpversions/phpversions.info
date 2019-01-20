<?php

namespace App\Http\Controllers\Api\v2;

use App\Repositories\VulnerabilityRepository;
use App\Transformers\Api\v2\VulnerabilitiesTransformer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Serializer\JsonApiSerializer;

class VulnerabilitiesController extends ApiBaseController
{
    private const BASE_URL = 'https://phpversions.info';

    /** @var Response */
    private $response;

    /** @var VulnerabilityRepository */
    private $vulnerabilityRepository;

    /** @var VulnerabilitiesTransformer */
    private $transformer;

    public function __construct(Response $response, VulnerabilityRepository $vulnerabilityRepository, VulnerabilitiesTransformer $transformer)
    {
        parent::__construct($response);
        $this->vulnerabilityRepository = $vulnerabilityRepository;
        $this->transformer = $transformer;
    }

    public function index() : Response
    {
        $vulnerabilities = $this->vulnerabilityRepository->get();
        $collection = $vulnerabilities->getCollection();
        $manager = $this->createManager();

        $resources = new Collection($collection, $this->transformer, 'Vulnerabilities');
        $resources->setMeta($this->createMetaData());
        $resources->setPaginator(new IlluminatePaginatorAdapter($vulnerabilities));

        $data = $manager->createData($resources)->toArray();

        $etag = md5(json_encode($vulnerabilities));

        return $this->createSuccessResponse($data, $etag);
    }
}
