<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'id', 'pref_id', 'name', 'company', 'address', 'released_at',
    ];

    public function pref()
    {
        return $this->belongsTo(Pref::class);
    }
}
