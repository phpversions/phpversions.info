<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HostEvent extends Model
{
    private const CURRENT_VERSION = 7.2;

    protected $fillable = [
        'host_id',
        'host_type',
        'php_versions_url',
        'php_version',
        'latest_patch_version',
        'default_php_version',
        'patch_policy',
        'manual_update_major_minor',
        'is_confirmed',
        'semver',
    ];

    public function getId() : int
    {
        return $this->id;
    }

    public function setHostType(bool $hostType) : void
    {
        $this->host_type = $hostType;
    }

    public function getHostType() : string
    {
        return $this->host_type;
    }

    public function setLatestPatchVersion(int $version) : void
    {
        $this->latest_patch_version = $version;
    }

    public function getLatestPatchVersion() : int
    {
        return $this->latest_patch_version;
    }

    public function setDefaultPhpVersion(int $version) : void
    {
        $this->default_php_version = $version;
    }

    public function getDefaultPhpVersion() : ? int
    {
        return $this->default_php_version;
    }

    public function setPatchPolicy(string $policySetter) : void
    {
        $this->patch_policy = $policySetter;
    }

    public function getPatchPolicy() : string
    {
        return $this->patch_policy;
    }

    public function setManualUpdatePolicy(bool $updatePolicy) : void
    {
        $this->manual_update_policy = $updatePolicy;
    }

    public function getManualUpdatePolicy() : bool
    {
        return $this->manual_update_policy;
    }

    public function setIsConfirmed(bool $isConfirmed) : void
    {
        $this->is_confirmed = $isConfirmed;
    }

    public function getIsConfirmed() : bool
    {
        return $this->is_confirmed;
    }

    public function setSemver(string $semver) : void
    {
        $this->semver = $semver;
    }

    public function getSemver() : ? string
    {
        return $this->semver;
    }

    public function getPhpVersion() : ? int
    {
        return $this->php_version;
    }

    public function setPhpVersion(int $phpVersion) : void
    {
        $this->php_version = $phpVersion;
    }

    public function host() : BelongsTo
    {
        return $this->belongsTo(Host::class, 'id', 'host_id');
    }

    public function scopeByVersion(Builder $query, int $version) : Builder
    {
        return $query->where('php_version', '=', $version);
    }

    public function scopeBySharedHost(Builder $query) : Builder
    {
        return $query->where('host_type', '=', 'shared');
    }

    public function scopeByManagedHost(Builder $query) : Builder
    {
        return $query->where('host_type', '=', 'managed');
    }

    public function scopeByPaasHost(Builder $query) : Builder
    {
        return $query->where('host_type', '=', 'paas');
    }
}
