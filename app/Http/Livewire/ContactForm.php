<?php

namespace App\Http\Livewire;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactForm extends Component
{
    public string $name  = '';
    public string $email = '';
    public string $body  = '';

    public array $rules = [
        'name' => 'required',
        'email' => ['required', 'email'],
        'body' => 'required',
    ];

    public function sendmail()
    {
        $this->validate();

        Mail::to(config('mail.from.address'))
            ->send(new ContactMail($this->name, $this->email, $this->body));

        $this->reset();

        session()->flash('mail_success', true);
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
