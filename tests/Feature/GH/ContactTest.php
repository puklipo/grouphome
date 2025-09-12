<?php

namespace Tests\Feature\GH;

use App\Models\Contact;
use App\Models\User;
use App\Notifications\ContactNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Routing\Middleware\ValidateSignature;
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

    public function test_admin_contacts_index()
    {
        $user = User::factory()->create();

        Contact::factory(30)->create();

        $response = $this->actingAs($user)->get(route('admin.contacts'));

        $response->assertSuccessful()
            ->assertSeeLivewire('admin.contacts-index');
    }

    public function test_contacts_preview()
    {
        $contact = Contact::factory()->create()->first();

        $response = $this->withoutMiddleware(ValidateSignature::class)
            ->get(route('contact.preview', $contact));

        $response->assertSuccessful()
            ->assertSeeText($contact->name);
    }
}
