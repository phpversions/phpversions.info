<?php

namespace App\Http\Controllers\Api\v2;

use App\Managers\CurrentPhpVersionManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class CurrentPhpVersionController extends Controller
{
    /** @var CurrentPhpVersionManager */
    private $versionManager;

    /** @var Response */
    private $response;

    public function __construct(CurrentPhpVersionManager $versionManager, Response $response)
    {
        $this->versionManager = $versionManager;
        $this->response = $response;
    }

    public function index()
    {
        $data = $this->versionManager->getCurrentVersionSupportedHosts();

        // return transformer
    }
}
