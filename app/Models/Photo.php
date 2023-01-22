<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperPhoto
 */
class Photo extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $touches = ['home'];

    public function home()
    {
        return $this->belongsTo(Home::class);
    }
}
