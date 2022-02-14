<?php

namespace App\Http\Livewire;

use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

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

    public function ready(Request $request)
    {
        $this->name = $request->user()->name ?? '';
        $this->email = $request->user()->email ?? '';
    }

    public function sendmail()
    {
        $this->validate();

        Contact::forceCreate([
            'name'  => $this->name,
            'email' => $this->email,
            'body'  => $this->body,
        ]);

        Mail::to(config('mail.contact.to'))
            ->send(new ContactMail($this->name, $this->email, $this->body));

        $this->reset();

        session()->flash('mail_success', true);
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
