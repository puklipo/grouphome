<?php

namespace App\Notifications;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\URL;
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
        protected Contact $contact
    ) {
        //
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via(mixed $notifiable): array
    {
        return collect(['mail'])
            ->when(
                filled(config('line.notify.personal_access_token')),
                fn (Collection $collection) => $collection->push(LineNotifyChannel::class)
            )->toArray();
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(mixed $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('【'.config('app.name').'】お問い合わせ')
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->cc(config('mail.admin.to'))
            ->greeting(__('名前：').$this->contact->name)
            ->line([$this->contact->body])
            ->action(__('問い合わせを確認'), route('admin.contacts'))
            ->line('メール：'.$this->contact->email)
            ->salutation(__('このメールに返信はできないので問い合わせへの対応は新規メールを送信してください。'));
    }

    public function toLineNotify(mixed $notifiable): LineNotifyMessage
    {
        return LineNotifyMessage::create('問い合わせがありました。'.PHP_EOL.
            URL::temporarySignedRoute('contact.preview', now()->addDay(), $this->contact));
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
