<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Distribution;
use App\Models\DistributionEvent;
use Illuminate\Database\Eloquent\Collection;

class DistributionRepository implements Storable
{
    /** @var Distribution */
    private $distribution;

    public function __construct(Distribution $distribution)
    {
        $this->distribution = $distribution;
    }

    public function get() : Collection
    {
        return $this->distribution->all();
    }

    public function fetch(int $id) : Distribution
    {
        return $this->distribution->find($id);
    }

    public function create($object) : void
    {
        $distribution = new Distribution();

        $distribution->setName($object->name);
        $distribution->setUrl($object->package_url ?? null);

        $distribution->save();

        $distributionEvent = [
            'distro' => $object->distro ?? null,
            'package_url' => $object->package_url ?? null,
            'family' => $object->family ?? null,
            'default_php_version' => $object->version,
            'is_confirmed' => 0,
            'semver' => $object->semver ?? null,

        ];

        $distribution->events()->create($distributionEvent);
    }

    public function edit(object $object) : int
    {
        $distribution = $this->distribution->byId($object->id)->get();

        $distribution->setName($object->name);
        $distribution->setUrl($object->package_url ?? null);

        $distribution->save();

        return $object->id;
    }

    public function destroy(int $id) : int
    {
        $this->distribution->delete($id);

        return $id;
    }
}