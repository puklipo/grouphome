<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Livewire\Component;

/**
 * 問い合わせフォーム.
 */
class ContactForm extends Component
{
    public string $name = '';
    public string $email = '';
    public string $body = '';

    public array $rules = [
        'name'  => 'required',
        'email' => ['required', 'email'],
        'body'  => 'required',
    ];

    public function onReady(Request $request): void
    {
        $this->name = $request->user()->name ?? '';
        $this->email = $request->user()->email ?? '';
    }

    public function sendmail(): void
    {
        $this->validate();

        Contact::forceCreate([
            'name'  => $this->name,
            'email' => $this->email,
            'body'  => trim($this->body),
        ]);

        $this->reset();

        session()->flash('mail_success', true);
    }

    public function render(): View
    {
        return view('livewire.contact-form');
    }
}
