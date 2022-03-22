<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Collection;
use Revolution\Line\Notifications\LineNotifyChannel;
use Revolution\Line\Notifications\LineNotifyMessage;

class ContactNotification extends Notification implements ShouldQueue
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
        return collect(['mail'])
            ->when(
                filled(config('line.notify.personal_access_token')),
                fn (Collection $collection) => $collection->push(LineNotifyChannel::class)
            )->toArray();
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('【'.config('app.name').'】お問い合わせ')
            ->from($this->email, $this->name)
            ->greeting(__('名前：').$this->name)
            ->line($this->body)
            ->action('問い合わせを確認', route('admin.contacts'))
            ->line($this->email)
            ->salutation('このメールに返信はできないので問い合わせへの対応は新規メールを送信してください。');
    }

    /**
     * @param  mixed  $notifiable
     * @return LineNotifyMessage
     */
    public function toLineNotify($notifiable)
    {
        return LineNotifyMessage::create('問い合わせがありました。');
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
