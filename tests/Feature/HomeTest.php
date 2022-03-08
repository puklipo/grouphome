<?php

namespace Tests\Feature;

use App\Models\Home;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_show()
    {
        $this->seed();

        $home = Home::factory()->create();

        $response = $this->get(route('home.show', $home));

        $response->assertStatus(200);
    }

    public function test_home_redirect()
    {
        $response = $this->get(route('home.index'));

        $response->assertRedirect();
    }
}
