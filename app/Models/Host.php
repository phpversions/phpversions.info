<?php

namespace App\Models;

use App\Models\Interfaces\Hostable;
use DateTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Host extends Model implements Hostable
{
    private $default = '';

    public function getId() : int
    {
        return $this->id;
    }

    public function setId(int $id) : void
    {
        $this->id = $id;
    }

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

    public function setUrl(string $url) : void
    {
        $this->url = $url;
    }

    public function getUpdatedAt() : DateTime
    {
       return $this->updated_at;
    }

    public function events() : HasMany
    {
        return $this->hasMany(HostEvent::class, 'host_id', 'id');
    }

    public function event() : HasOne
    {
        return $this->hasOne(HostEvent::class, 'host_id', 'id');
    }

    public function hasName() : bool
    {
        if ($this->name) {
            return true;
        }

        return false;
    }

    public function scopeFilterSharedHosts(Builder $query) : Builder
    {
        return $query->where('is_shared_host', '=', 1);
    }

    public function scopeFilterManagedHosts(Builder $query) : Builder
    {
        return $query->where('is_shared_host', '=', 0);
    }

    public function getDefaultPhpVersion() : ? string
    {
        $this->events->each(function ($event) {
            if ($this->event->getDefaultPhpVersion() === $event->getPhpVersion()) {
                $this->default = $event->getSemver();
            }
        });

        return $this->default ?? '??';
    }
}
