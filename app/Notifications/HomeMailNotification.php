<?php

namespace App\Notifications;

use App\Models\Home;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class HomeMailNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        public Home $home,
        public string $name = '',
        public string $email = '',
        public string $tel = '',
        public string $subject = '',
        public string $body = ''
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
            ->subject('【'.$this->home->name.'】'.$this->name.__('さんからのお問い合わせ'))
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->greeting('【'.$this->subject.'】'.$this->name.__('さんからのお問い合わせ'))
            ->line($this->body)
            ->line(__('【名前】').$this->name)
            ->line(__('【メール】').$this->email)
            ->line(__('【電話番号】').$this->tel)
            ->salutation(__('このメールに返信はできないのでお問い合わせへの対応は新規メールを送信してください。'));
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
