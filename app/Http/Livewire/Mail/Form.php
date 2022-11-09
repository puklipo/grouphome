<?php

namespace App\Http\Livewire\Mail;

use App\Models\Home;
use App\Notifications\ContactNotification;
use App\Notifications\HomeMailCreatedNotification;
use App\Notifications\HomeMailNotification;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class Form extends Component
{
    public Home $home;

    public string $name = '';
    public string $email = '';
    public string $tel = '';
    public string $subject = '見学';
    public string $body = '';

    public array $rules = [
        'name' => 'required',
        'email' => ['required', 'email'],
        'subject' => 'required',
        'body' => 'required',
    ];

    public function sendmail()
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

        Notification::route('line-notify', config('line.notify.personal_access_token'))
                    ->notify(new HomeMailCreatedNotification($this->home));

        session()->flash('mail_success', true);
    }

    public function render()
    {
        return view('livewire.mail.form');
    }
}
