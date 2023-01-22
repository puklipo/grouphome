<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperPref
 */
class Pref extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function homes()
    {
        return $this->hasMany(Home::class);
    }
}
