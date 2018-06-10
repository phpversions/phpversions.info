<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Version extends Model
{
    public function getVersion() : int
    {
        return $this->version;
    }

    public function setVersion(int $version) : void
    {
        $this->version = $version;
    }

    public function getEol() : DateTime
    {
        return $this->eol;
    }

    public function setEol(DateTime $eol) : void
    {
        $this->eol = $eol;
    }

    public function getVulnerabilities() : bool
    {
        return $this->vulnerabilities;
    }

    public function setVulnerabilties(bool $vulnerabilities) : void
    {
        $this->vulnerabilties = $vulnerabilities;
    }

    public function getReleaseDocs() : string
    {
        return $this->release_docs;
    }

    public function setReleaseDocs($releaseDocs) : void
    {
        $this->release_docs = $releaseDocs;
    }

    public function vulnerabilities() : HasMany
    {
        return $this->hasMany(Vulnerability::class, 'version_id', 'id');
    }
}
