<?php

namespace GH;

use App\Models\Home;
use App\Models\User;
use App\Notifications\ContactNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Livewire\Livewire;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_contact_form()
    {
        Livewire::actingAs($user = User::factory()->create())
                ->test('contact-form')
                ->call('onReady')
                ->assertSet('name', $user->name)
                ->assertSet('email', $user->email);

        $response = $this->get(route('contact'));

        $response->assertSeeLivewire('contact-form');
    }

    public function test_sendmail()
    {
        Notification::fake();

        Livewire::actingAs($user = User::factory()->create())
                ->test('contact-form')
                ->call('onReady')
                ->set('body', 'test')
                ->call('sendmail');

        Notification::assertSentOnDemand(ContactNotification::class);

        $this->assertDatabaseHas('contacts', [
            'name' => $user->name,
            'email' => $user->email,
            'body' => 'test',
        ]);
    }
}
