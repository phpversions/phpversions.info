<?php

namespace App\Models\Blog;

use App\Models\User;
use DateTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    public function getTitle() : string
    {
        return $this->title;
    }

    public function getHeadline() : string
    {
        return $this->headline;
    }

    public function getPost() : string
    {
        return $this->post;
    }

    public function getSlug() : string
    {
        return $this->slug;
    }

    public function getPublishedAt() : DateTime
    {
        return new DateTime($this->published_at);
    }

    public function author() : HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function scopeBySlug(Builder $query, string $slug) : Builder
    {
        return $query->where('slug', '=', $slug);
    }
}
