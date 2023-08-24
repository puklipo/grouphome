<?php

namespace App\Models;

use App\Notifications\OperatorRequestCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Notification;

/**
 * @mixin IdeHelperOperatorRequest
 */
class OperatorRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'home_id',
        'user_id',
    ];

    protected static function booted(): void
    {
        static::created(function ($request) {
            Notification::route('mail', config('mail.admin.to'))
                ->notify(new OperatorRequestCreated($request));
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function home(): BelongsTo
    {
        return $this->belongsTo(Home::class);
    }
}
