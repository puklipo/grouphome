<?php

namespace App\Livewire\Mail;

use App\Models\Home;
use App\Notifications\HomeMailCreatedNotification;
use App\Notifications\HomeMailNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Form extends Component
{
    public Home $home;

    #[Validate('required')]
    public string $name = '';

    #[Validate(['required', 'email'])]
    public string $email = '';

    public string $tel = '';

    #[Validate('required')]
    public string $subject = '見学';

    #[Validate('required')]
    public string $body = '';

    public function sendmail(): void
    {
        $this->validate();

        Notification::send(
            $this->home->users,
            new HomeMailNotification(
                home: $this->home,
                name: $this->name,
                email: $this->email,
                tel: $this->tel,
                subject: $this->subject,
                body: $this->body
            )
        );

        Notification::route('mail', config('mail.admin.to'))
            ->notify(new HomeMailCreatedNotification($this->home));

        session()->flash('mail_success', true);
    }

    public function render(): View
    {
        return view('livewire.mail.form');
    }
}
