<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HostEvent extends Model
{
    protected $fillable = [
        'host_id',
        'is_shared_host',
        'php_versions_url',
        'php_version',
        'latest_patch_version',
        'default_php_version',
        'patch_policy',
        'manual_update_major_minor',
        'is_confirmed'
    ];

    public function setIsSharedHost(bool $isSharedHost) : void
    {
        $this->is_shared_host = $isSharedHost;
    }

    public function getIsSharedHost() : bool
    {
        return $this->is_shared_host;
    }

    public function setLatestPatchVersion(int $version)
    {
        $this->latest_patch_version = $version;
    }

    public function getLatestPatchVersion() : int
    {
        return $this->latest_patch_version;
    }

    public function setDefaultPhpVersion(int $version)
    {
        $this->default_php_version = $version;
    }

    public function getDefaultPhpVersion() : int
    {
        return $this->default_php_version;
    }

    public function setPatchPolicy(string $policySetter)
    {
        $this->patch_policy = $policySetter;
    }

    public function getPatchPolicy() : string
    {
        return $this->patch_policy;
    }

    public function setManualUpdatePolicy(bool $updatePolicy)
    {
        $this->manual_update_policy = $updatePolicy;
    }

    public function getManualUpdatePolicy() : bool
    {
        return $this->manual_update_policy;
    }

    public function setIsConfirmed(bool $isConfirmed)
    {
        $this->is_confirmed = $isConfirmed;
    }

    public function getIsConfirmed() : bool
    {
        return $this->is_confirmed;
    }

    public function host() : BelongsTo
    {
        return $this->belongsTo(Host::class, 'id', 'host_id');
    }

    public function scopeByCurrentVersion(Builder $query, string $version)
    {
        return $query->where('php_version', '=', $version);
    }
}
