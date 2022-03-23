<?php

namespace App\Models;

use App\Notifications\OperatorRequestCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Notification;

class OperatorRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'home_id',
        'user_id',
    ];

    /**
     * @return void
     */
    protected static function booted()
    {
        static::created(function ($request) {
            Notification::route('mail', config('mail.contact.to'))
                        ->notify(new OperatorRequestCreated($request));
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function home()
    {
        return $this->belongsTo(Home::class);
    }
}
