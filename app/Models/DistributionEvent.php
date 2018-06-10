<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DistributionEvent extends Model
{
    protected $fillable = [
        'distribution_id',
        'distro',
        'package_url',
        'family',
        'default_php_version',
        'is_confirmed'
    ];

    public function getDefaultPhpVersion() : string
    {
        return $this->default_php_version;
    }

    public function setDefaultPhpVersion(?string $version) : void
    {
        $this->default_php_version = $version;
    }

    public function getDistro() : string
    {
        return $this->distro;
    }

    public function setDistro(string $distro) : void
    {
        $this->distro = $distro;
    }

    public function getPackageUrl() : string
    {
        return $this->package_url;
    }

    public function setPackageUrl(?string $packageUrl) : void
    {
        $this->package_url = $packageUrl;
    }
    public function getFamily() : string
    {
        return $this->family;
    }

    public function setFamily(string $family) : void
    {
        $this->family = $family;
    }

    public function getIsConfirmed() : int
    {
        return $this->is_confirmed;
    }

    public function setIsConfirmed(int $isConfirmed) : void
    {
        $this->is_confirmed = $isConfirmed;
    }

    public function distribution() : BelongsTo
    {
        return $this->belongsTo(Distribution::class, 'id', 'distribution_id');
    }
}
