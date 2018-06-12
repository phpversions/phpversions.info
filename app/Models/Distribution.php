<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Distribution extends Model
{
    public function getName() : string
    {
        return $this->name;
    }

    public function setName(string $name) : void
    {
        $this->name = $name;
    }

    public function getUrl() : string
    {
        return $this->url;
    }

    public function setUrl(?string $url) : void
    {
        $this->url = $url;
    }

    public function events() : HasMany
    {
        return $this->hasMany(DistributionEvent::class, 'distribution_id', 'id');
    }

    public function scopeById(Builder $query, int $id)
    {
        return $query->where('id', '=', $id);
    }

    public function scopeByName(Builder $query, string $name)
    {
        return $query->where('name', '=', $name);
    }

    public function scopeByUrl(Builder $query, string $url)
    {
        return $query->where('url', '=', $url);
    }

    public function hasName() : bool
    {
        if ($this->name) {
            return true;
        }

        return false;
    }
}
