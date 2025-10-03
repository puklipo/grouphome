<?php

namespace App\Notifications;

use App\Models\Home;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

class MailPrepareNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        protected Home $home,
        protected string $email
    ) {
        //
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via(mixed $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(mixed $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject($this->home->name.'への問い合わせフォーム')
            ->greeting($this->home->name.'への問い合わせは以下のフォームを使用してください。')
            ->action('問い合わせフォーム', URL::temporarySignedRoute('home.mail.form', now()->addDay(),
                ['home' => $this->home, 'mail' => $this->email]))
            ->salutation('フォームは今から24時間のみ有効です。');
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray(mixed $notifiable): array
    {
        return [
            //
        ];
    }
}
