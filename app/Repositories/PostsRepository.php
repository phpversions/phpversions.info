<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Blog\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PostsRepository
{
    /** @var Post */
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function get() : LengthAwarePaginator
    {
        return $this->post->paginate();
    }

    public function findPostBySlug(string $slug) : Post
    {
        return $this->post->bySlug($slug)->first();
    }
}