<?php

namespace App\Notifications;

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
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('【'.config('app.name').'】'.$this->name.__('さんからのお問い合わせ'))
            ->from($this->email, $this->name)
            ->greeting('【'.$this->subject.'】'.$this->name.__('さんからのお問い合わせ'))
            ->line($this->body)
            ->line(__('【メール】').$this->email.' '.__('【電話番号】').$this->tel)
            ->salutation(__('このメールに返信はできないのでお問い合わせへの対応は新規メールを送信してください。'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
