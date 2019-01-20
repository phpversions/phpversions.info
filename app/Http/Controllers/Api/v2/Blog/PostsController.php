<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\v2\Blog;

use App\Http\Controllers\Api\v2\ApiBaseController;
use App\Models\Post;
use App\Repositories\PostsRepository;
use App\Transformers\Api\v2\PostsTransformer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class PostsController extends ApiBaseController
{
    /** @var Response */
    private $response;

    /** @var PostsTransformer */
    private $transformer;

    /** @var PostsRepository */
    private $postsRepository;

    public function __construct(Response $response, PostsTransformer $transformer, PostsRepository $postsRepository)
    {
        parent::__construct($response);
        $this->transformer = $transformer;
        $this->postsRepository = $postsRepository;
    }

    public function index() : Response
    {
        $posts = $this->postsRepository->get();
        $collection = $posts->getCollection();

        $manager = $this->createManager();

        $resources = new Collection($collection, $this->transformer, 'Posts');
        $resources->setMeta($this->createMetaData());
        $resources->setPaginator(new IlluminatePaginatorAdapter($posts));

        $data = $manager->createData($resources)->toArray();

        $etag = md5(json_encode($resources));

        return $this->createSuccessResponse($data, $etag);
    }

    public function fetch(Request $request) : Response
    {
        $post = $this->postsRepository->findPostBySlug($request->slug);

        $manager = $this->createManager();

        $resources = new Item($post, $this->transformer, 'Posts');
        $resources->setMeta($this->createMetaData());

        $data = $manager->createData($resources)->toArray();

        $etag = md5(json_encode($resources));

        return $this->createSuccessResponse($data, $etag);
    }
}
