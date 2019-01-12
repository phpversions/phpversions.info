<?php

namespace Tests\Feature\Web;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManagedHostsWebTest extends TestCase
{
    public function testGetManagedHosts() : void
    {
        $response = $this->get('/api/hosts/managed');

        $response->assertStatus(200);
        $response->assertHeader('etag');
        $response->assertHeader('accept');
        $response->assertHeader('content-type');
    }
}
