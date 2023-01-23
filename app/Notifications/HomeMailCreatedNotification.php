<?php

namespace App\Notifications;

use App\Models\Home;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Collection;
use Revolution\Line\Notifications\LineNotifyChannel;
use Revolution\Line\Notifications\LineNotifyMessage;

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
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via(mixed $notifiable): array
    {
        return collect()
            ->when(
                filled(config('line.notify.personal_access_token')),
                fn (Collection $collection) => $collection->push(LineNotifyChannel::class)
            )->toArray();
    }

    /**
     * 動作確認用。例えば大量のメールが送信された時に気付けるように。問い合わせの内容はどこにも記録しない。
     *
     * @param  mixed  $notifiable
     * @return LineNotifyMessage
     */
    public function toLineNotify(mixed $notifiable): LineNotifyMessage
    {
        return LineNotifyMessage::create($this->home->name.'への問い合わせが送信されました。');
    }
}
