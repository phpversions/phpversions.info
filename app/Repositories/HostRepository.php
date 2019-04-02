<?php

namespace App\Repositories;

use App\Models\Host;
use App\Models\HostEvent;
use Illuminate\Database\Eloquent\Collection;

class HostRepository implements Storable
{
    /** @var Host */
    private $host;

    public function __construct(Host $host)
    {
        $this->host = $host;
    }

    public function get() : Collection
    {
        return $this->host->all();
    }

    public function fetch(int $id) : Host
    {
        return $this->host->find($id);
    }

    public function create($object) : void
    {
        $host = new Host();

        $host->setName($object->name);
        $host->setUrl($object->url);

        $host->save();

        foreach($object->versions as $key => $version) {
            $host->events()->create([
                'host_id' => $host->id,
                'host_type' => $object->type,
                'php_versions_url' => $version->phpinfo,
                'php_version' => $key,
                'latest_patch_version' => $version->patch ?? null,
                'default_php_version' => $object->default,
                'patch_policy' => ($object->type === 'shared') ? 'host' : 'user',
                'manual_update_major_minor' => ($object->type === 'shared') ? 0 : 1,
                'is_confirmed' => 0,
                'semver' => $version->semver ?? null,
            ]);
        }
    }

    public function edit(object $object) : void
    {
        // TODO: Implement edit() method.
    }

    public function destroy(int $id) : void
    {
        // TODO: Implement destroy() method.
    }

    public function findSharedHosts() : Collection
    {
        return $this->host->whereHas('events', function ($query) {
            $query->bySharedHost();
        })->with(['event' => function ($query) {
            $query->bySharedHost();
        }])->get();
    }

    public function findManagedHosts() : Collection
    {
        return $this->host->whereHas('events', function ($query) {
            $query->byManagedHost();
        })->with(['event' => function ($query) {
            $query->byManagedHost();
        }])->get();
    }

    public function findPaasHosts() : Collection
    {
        return $this->host->whereHas('events', function ($query) {
            $query->byPaasHost();
        })->with(['event' => function ($query) {
            $query->byPaasHost();
        }])->get();
    }

    public function findBySlug(string $hostName)
    {
        return $this->host->byHostName($hostName)->get();
    }

    public function findHostsWithPhpVersionsUrl() : Collection
    {

    }
}