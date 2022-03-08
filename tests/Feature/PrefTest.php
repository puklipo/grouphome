<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PrefTest extends TestCase
{
    use RefreshDatabase;

    public function test_pref()
    {
        $this->seed();

        $response = $this->get(route('pref', 1));

        $response->assertStatus(200);
    }
}
