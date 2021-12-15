<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'id', 'pref_id', 'name', 'company', 'address', 'area', 'released_at',
    ];

    public function pref()
    {
        return $this->belongsTo(Pref::class);
    }

    public function scopeKeywordSearch($query, $search)
    {
        return $query->when($search, function (Builder $query, $search) {
            $query->where(function (Builder $query) use ($search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('address', 'like', "%$search%")
                    ->orWhere('company', 'like', "%$search%");
            });
        });
    }
}
