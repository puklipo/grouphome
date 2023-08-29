<?php

namespace Tests\Feature\GH;

use App\Models\Home;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_show_guest()
    {
        $this->seed();

        $home = Home::factory()->create();

        $response = $this->get(route('home.show', $home));

        $response->assertOk()
            ->assertDontSeeText('変更（管理者用）');
    }

    public function test_home_redirect()
    {
        $response = $this->get(route('home.index'));

        $response->assertRedirect();
    }

    public function test_home_admin()
    {
        $this->seed();

        $home = Home::factory()->hasUsers(1)->create();

        $response = $this->actingAs($home->users->first())->get(route('home.show', $home));

        $response->assertSeeText('変更（管理者用）')
            ->assertSeeLivewire('home.basic-editor');
    }

    public function test_home_operator()
    {
        $this->seed();

        $home = Home::factory()->hasUsers(2)->create();

        $response = $this->actingAs($home->users->last())->get(route('home.show', $home));

        $response->assertSee('wam.go.jp')
            ->assertDontSeeText('変更（管理者用）');
    }
}
