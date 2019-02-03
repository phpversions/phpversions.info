<?php

declare(strict_types=1);

namespace App\Services;

use App\Dto\Contributor;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Collection;

class GithubService
{
    private const CONTRIBUTORS_URI = '/repos/phpversions/phpversions.info/contributors';

    public function getContributors() : Collection
    {
        $url = $this->buildUri(self::CONTRIBUTORS_URI);

        $response = $this->createClient()->get($url);

        $collection = new Collection();

        $data = json_decode($response->getBody()->getContents(), true);

        foreach ($data as $res) {
            $contributor = new Contributor();

            $contributor->setAvatar($res['avatar_url']);
            $contributor->setUsername($res['login']);
            $contributor->setRepoUrl($res['html_url']);

            $collection->add($contributor);
        }

        return $collection;
    }

    private function buildUri(string $uri) : string
    {
        return getenv('GITHUB_API_ENDPOINT') . $uri;
    }

    private function createClient() : Client
    {
        return new Client();
    }
}