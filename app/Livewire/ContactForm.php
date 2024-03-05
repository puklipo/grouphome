<?php

namespace App\Livewire;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;

/**
 * 問い合わせフォーム.
 */
class ContactForm extends Component
{
    #[Validate('required')]
    public string $name = '';

    public string $email = '';

    #[Validate('required')]
    public string $body = '';

    public function rules(): array
    {
        return [
            'email' => [
                'required', 'string', 'lowercase', 'email', 'max:255',
                Rule::notIn(config('spam')),
            ],
        ];
    }

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
