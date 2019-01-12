<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\v2;

use App\Repositories\HostRepository;
use App\Transformers\Api\v2\HostTransformer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use League\Fractal\Resource\Collection;

class SharedHostsController extends ApiBaseController
{
    private const HOST_EVENTS = 'events';

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
        $sharedHosts = $this->repository->findSharedHosts();

        $manager = $this->createManager();
        $manager->parseIncludes(self::HOST_EVENTS);

        $resources = new Collection($sharedHosts, $this->transformer, 'SharedHost');
        $resources->setMeta($this->createMetaData());

        $data = $manager->createData($resources)->toArray();

        $etag = md5(json_encode($data));

        return $this->createSuccessResponse($data, $etag);
    }
}
