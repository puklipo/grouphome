<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 25;

    protected $casts = [
        'released_at' => 'date:Y-m-d',
    ];

    public $incrementing = false;

    protected $fillable = [
        'id',
        'pref_id',
        'name',
        'company',
        'tel',
        'address',
        'area',
        'map',
        'url',
        'level',
        'released_at',
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
