<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperVacancy
 */
class Vacancy extends Model
{
    use HasFactory;

    protected $touches = ['home'];

    public function home()
    {
        return $this->belongsTo(Home::class);
    }
}
