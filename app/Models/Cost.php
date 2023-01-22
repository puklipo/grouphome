<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperCost
 */
class Cost extends Model
{
    use HasFactory;

    protected $touches = ['home'];

    public function home()
    {
        return $this->belongsTo(Home::class);
    }
}
