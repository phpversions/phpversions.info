<?php

namespace App\Http\Controllers\Api\v2;

use App\Repositories\HostRepository;
use App\Transformers\Api\v2\HostTransformer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class SharedHostsController extends Controller
{
    /** @var Response */
    private $response;

    /** @var HostRepository */
    private $repository;

    /** @var HostTransformer */
    private $transformer;

    public function __construct(Response $response, HostRepository $repository, HostTransformer $transformer)
    {
        $this->response = $response;
        $this->repository = $repository;
        $this->transformer = $transformer;
    }

    public function index() : Response
    {
        $data = $this->repository->findSharedHosts();

        return $this->response
            ->setStatusCode(200)
            ->setClientTtl(900)
            ->setContent(
                fractal($data)
                    ->transformWith($this->transformer)
                    ->includeEvents()
                    ->toArray()
            );
    }
}
