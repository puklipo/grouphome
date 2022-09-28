<?php

namespace Tests\Feature;

use App\Models\Home;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OperatorTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_show()
    {
        $this->seed();

        $user = User::factory()
                    ->hasHomes(10)
                    ->create();

        $response = $this->actingAs($user)->get(route('dashboard'));

        $response->assertOk();
    }

    public function test_dashboard_redirect()
    {
        $response = $this->get(route('dashboard'));

        $response->assertRedirect();
    }
}
