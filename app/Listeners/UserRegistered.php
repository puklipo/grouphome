<?php

namespace App\Listeners;

use App\Notifications\UserRegisteredNotification;
use Illuminate\Auth\Events\Registered;
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
     */
    public function handle(Registered $event): void
    {
        Notification::route('mail', config('mail.admin.to'))
            ->notify(new UserRegisteredNotification($event->user));
    }
}
