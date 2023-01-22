<?php

namespace App\Models;

use App\Notifications\ContactNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Notification;

/**
 * @mixin IdeHelperContact
 */
class Contact extends Model
{
    use HasFactory;

    /**
     * @return void
     */
    protected static function booted()
    {
        static::created(function ($contact) {
            Notification::route('mail', config('mail.contact.to'))
                        ->route('line-notify', config('line.notify.personal_access_token'))
                        ->notify(new ContactNotification($contact));
        });
    }
}
