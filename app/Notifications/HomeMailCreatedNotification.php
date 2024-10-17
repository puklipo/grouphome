<?php

namespace App\Notifications;

use App\Models\Home;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class HomeMailCreatedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        public Home $home,
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
     * 動作確認用。例えば大量のメールが送信された時に気付けるように。問い合わせの内容はどこにも記録しない。
     */
    public function toMail(mixed $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject(__('【問い合わせ送信】'))
            ->greeting('問い合わせ送信')
            ->line($this->home->name.'への問い合わせが送信されました。');
    }
}
