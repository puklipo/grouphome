<?php

namespace App\Livewire;

use App\Models\Contact;
use Illuminate\Http\Request;
use Livewire\Attributes\Rule;
use Livewire\Component;

/**
 * 問い合わせフォーム.
 */
class ContactForm extends Component
{
    #[Rule('required')]
    public string $name = '';

    #[Rule('required', 'email')]
    public string $email = '';

    #[Rule('required')]
    public string $body = '';

    public function onReady(Request $request): void
    {
        $this->name = $request->user()->name ?? '';
        $this->email = $request->user()->email ?? '';
    }

    public function sendmail(): void
    {
        $this->validate();

        Contact::forceCreate([
            'name' => $this->name,
            'email' => $this->email,
            'body' => trim($this->body),
        ]);

        $this->reset();

        session()->flash('mail_success', true);
    }
}
