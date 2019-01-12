<?php

namespace Tests\Feature\Web;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SharedHostsWebTest extends TestCase
{
    public function testGetSharedHosts() : void
    {
        $response = $this->get('/api/hosts/shared');

        $response->assertSuccessful();
        $response->assertHeader('accept');
        $response->assertHeader('content-type');
        $response->assertHeader('etag');
    }
}
