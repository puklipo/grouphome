<?php

namespace Tests\Feature;

use App\Models\Home;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DetailSearchTest extends TestCase
{
    use RefreshDatabase;

    public function test_example()
    {
        $this->seed();

        $home = Home::factory()->count(10)->create();

        $response = $this->get(route('detail-search'));

        $response->assertStatus(200);
    }
}
