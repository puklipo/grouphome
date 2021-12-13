<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pref extends Model
{
    use HasFactory;

    protected $fillable = [
        'key', 'name',
    ];

    public $timestamps = false;

    public function homes()
    {
        return $this->hasMany(Home::class);
    }
}
