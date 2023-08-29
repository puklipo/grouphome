<?php

namespace App\Livewire\Mail;

use App\Models\Home;
use App\Notifications\MailPrepareNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\View\View;
use Livewire\Component;

class Prepare extends Component
{
    public Home $home;

    public string $email = '';

    public array $rules = [
        'email' => ['required', 'email'],
    ];

    public function sendmail(): void
    {
        $this->validate();

        Notification::route('mail', $this->email)
            ->notify(new MailPrepareNotification($this->home, $this->email));

        session()->flash('mail_success', true);
    }

    public function render(): View
    {
        return view('livewire.mail.prepare');
    }
}
