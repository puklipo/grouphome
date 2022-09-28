<?php

namespace Tests\Feature;

use App\Models\Home;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class HomeMailTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    public function test_home_mail_prepare()
    {
        $home = Home::factory()->hasUsers(1)->create();

        $response = $this->get(route('home.mail.prepare', $home));

        $response->assertOk()
                 ->assertSeeLivewire('mail.prepare');
    }

    public function test_home_mail_prepare_redirect()
    {
        $home = Home::factory()->create();

        $response = $this->get(route('home.mail.prepare', $home));

        $response->assertRedirect()
                 ->assertDontSeeLivewire('mail.prepare');
    }

    public function test_home_mail_form()
    {
        $home = Home::factory()->hasUsers(1)->create();

        $response = $this->withoutMiddleware()
                         ->get(route('home.mail.form', ['home' => $home, 'mail' => 'test@example.com']));

        $response->assertOk()
                 ->assertViewHas('mail', 'test@example.com')
                 ->assertSeeLivewire('mail.form');
    }
}
