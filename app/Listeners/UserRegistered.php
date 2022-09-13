<?php

namespace App\Listeners;

use App\Notifications\UserRegisteredNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class UserRegistered
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Notification::route('mail', config('mail.admin.to'))
                    ->route('line-notify', config('line.notify.personal_access_token'))
                    ->notify(new UserRegisteredNotification());
    }
}
