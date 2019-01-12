<?php

namespace Tests\Feature\Web;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaasHostsWebTest extends TestCase
{
    public function testGetPaasHosts() : void
    {
        $response = $this->get('/api/hosts/paas');

        $response->assertSuccessful();
        $response->assertHeader('accept');
        $response->assertHeader('content-type');
        $response->assertHeader('etag');
    }
}
