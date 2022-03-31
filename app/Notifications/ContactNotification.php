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
            ->from($this->contact->email, $this->contact->name)
            ->greeting(__('名前：').$this->contact->name)
            ->line($this->contact->body)
            ->action(__('問い合わせを確認'), route('admin.contacts'))
            ->line($this->contact->email)
            ->salutation(__('このメールに返信はできないので問い合わせへの対応は新規メールを送信してください。'));
    }

    /**
     * @param  mixed  $notifiable
     * @return LineNotifyMessage
     */
    public function toLineNotify($notifiable)
    {
        return LineNotifyMessage::create('問い合わせがありました。'.PHP_EOL.
            URL::temporarySignedRoute('contact.preview', now()->addDay(), $this->contact));
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
