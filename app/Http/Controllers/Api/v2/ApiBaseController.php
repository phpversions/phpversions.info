<?php

namespace App\Http\Controllers\Api\v2;

use App\Services\ConstantService;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use League\Fractal\Manager;
use League\Fractal\Serializer\JsonApiSerializer;

class ApiBaseController extends Controller
{
    private const BASE_URL = 'https://phpversions.info';

    /** @var Response  */
    private $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    protected function createManager() : Manager
    {
        $manager = new Manager();

        return $manager;
    }

    protected function createMetaData() : array
    {
        return [
            'info' => [
                'title' => 'PHPVersions.info',
                'version' => '2.0.0',
                'contact' => [
                    'name'  => 'Developer Support',
                    'url'   => 'https://phpversions.org/developer-support',
                    'email' => 'support@phpversions.org',
                ],
                'license' => [
                    'name' => 'MIT',
                    'url'  => 'https://opensource.org/licenses/MIT',
                ],
            ],
        ];
    }

    public function createSuccessResponse($data, $etag) : Response
    {
        return $this->response
            ->header('content-type', ConstantService::ACCEPT_TYPE)
            ->header('accept', ConstantService::CONTENT_TYPE)
            ->header('accept-encoding', ConstantService::ACCEPT_CONTENT)
            ->setDate(new DateTime())
            ->setEtag($etag)
            ->setStatusCode(200)
            ->setContent($data);
    }

    public function createResourceNotFoundResponse() : Response
    {

    }
}
