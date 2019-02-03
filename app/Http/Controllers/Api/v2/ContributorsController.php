<?php

namespace App\Http\Controllers\Api\v2;

use App\Services\GithubService;
use App\Transformers\Api\v2\ContributorsTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use League\Fractal\Resource\Collection;

class ContributorsController extends ApiBaseController
{
    /** @var GithubService */
    private $service;

    /** @var ContributorsTransformer */
    private $transformer;

    public function __construct(Response $response, GithubService $service, ContributorsTransformer $transformer)
    {
        parent::__construct($response);
        $this->service = $service;
        $this->transformer = $transformer;
    }

    public function index() : Response
    {
        $contributors = $this->service->getContributors();

        $manager = $this->createManager();
        $resources = new Collection($contributors, $this->transformer, 'Contributors');
        $resources->setMeta($this->createMetaData());

        $data = $manager->createData($resources)->toArray();
        $etag = md5(json_encode($contributors));

        return $this->createSuccessResponse($data, $etag);
    }
}
