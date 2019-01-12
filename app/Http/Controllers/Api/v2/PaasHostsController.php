<?php

namespace App\Http\Controllers\Api\v2;

use App\Repositories\HostRepository;
use App\Transformers\Api\v2\HostTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use League\Fractal\Resource\Collection;

class PaasHostsController extends ApiBaseController
{
    /** @var Response */
    private $response;

    /** @var HostRepository */
    private $repository;

    /** @var HostTransformer */
    private $transformer;

    public function __construct(Response $response, HostRepository $repository, HostTransformer $transformer)
    {
        parent::__construct($response);
        $this->repository = $repository;
        $this->transformer = $transformer;
    }

    public function index() : Response
    {
        $paasHosts = $this->repository->findPaasHosts();

        if (!$paasHosts) {
            return $this->createResourceNotFoundResponse();
        }

        $manager = $this->createManager();
        $manager->parseIncludes('events');

        $resources = new Collection($paasHosts, $this->transformer, 'PaasHosts');
        $resources->setMeta($this->createMetaData());

        $data = $manager->createData($resources)->toArray();
        $manager->parseIncludes('events');

        $etag = md5(json_encode($data));

        return $this->createSuccessResponse($data, $etag);
    }
}
