<?php

namespace Tests\Feature\GH;

use App\Models\Home;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
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

    public function test_request_ok()
    {
        $this->seed();

        $user = User::factory()->create();

        $home = Home::factory()->create();

        $response = $this->actingAs($user)->post(route('operator.request', $home));

        $this->assertDatabaseHas('operator_requests', [
            'home_id' => $home->id,
            'user_id' => $user->id,
        ]);

        $response->assertRedirect();
    }

    public function test_admin_operator_home()
    {
        $this->seed();

        $admin = User::factory(2)
                     ->hasHomes(2)
                     ->create()
                     ->first();

        $response = $this->actingAs($admin)->get(route('operator-home.index'));

        $response->assertSeeText($admin->name);
    }

    public function test_admin_operator_home_destroy()
    {
        $this->seed();

        $admin = User::factory()->create();

        $ope = User::factory()
                   ->hasHomes(2)
                   ->create();

        $response = $this->actingAs($admin)->delete(route('operator-home.destroy', [
            'user' => $ope,
            'home' => $ope->homes()->first(),
            'confirm' => 1,
        ]));

        $response->assertRedirect();

        $this->assertSame(1, $ope->homes->count());
    }
}
