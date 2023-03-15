<?php

namespace Tests\Feature\GH;

use App\Models\Home;
use App\Notifications\HomeMailCreatedNotification;
use App\Notifications\HomeMailNotification;
use App\Notifications\MailPrepareNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Livewire\Livewire;
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

    public function test_home_mail_prepare_sendmail()
    {
        Notification::fake();

        $home = Home::factory()->create();

        Livewire::test('mail.prepare', ['home' => $home])
            ->set('email', 'test@localhost')
            ->call('sendmail');

        Notification::assertSentOnDemand(MailPrepareNotification::class);
    }

    public function test_home_mail_sendmail()
    {
        Notification::fake();

        $home = Home::factory()->hasUsers(1)->create();

        Livewire::test('mail.form', ['home' => $home, 'email' => 'test@localhost'])
                ->set('name', 'test')
                ->set('tel', 'test')
                ->set('subject', 'test')
                ->set('body', 'test')
                ->call('sendmail');

        Notification::assertSentTo($home->users, HomeMailNotification::class);
        Notification::assertSentOnDemand(HomeMailCreatedNotification::class);
    }
}
