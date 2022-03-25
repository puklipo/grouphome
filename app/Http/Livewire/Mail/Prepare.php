<?php

namespace App\Http\Livewire\Mail;

use App\Models\Home;
use App\Notifications\ContactNotification;
use App\Notifications\MailPrepareNotification;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class Prepare extends Component
{
    public Home $home;

    public string $email = '';

    public array $rules = [
        'email' => ['required', 'email'],
    ];

    public function sendmail()
    {
        $this->validate();

        Notification::route('mail', $this->email)
                    ->notify(new MailPrepareNotification($this->home, $this->email));

        session()->flash('mail_success', true);
    }

    public function render()
    {
        return view('livewire.mail.prepare');
    }
}
