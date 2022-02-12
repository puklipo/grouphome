<?php

namespace App\Models;

use Illuminate\Contracts\Database\Query\Builder;
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
    protected $perPage = 20;

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
        'wam',
        'level',
        'type_id',
        'released_at',
    ];

    public function pref()
    {
        return $this->belongsTo(Pref::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function equipment()
    {
        return $this->hasOne(Equipment::class)->withDefault();
    }

    public function facility()
    {
        return $this->hasOne(Facility::class)->withDefault();
    }

    public function condition()
    {
        return $this->hasOne(Condition::class)->withDefault();
    }

    public function vacancy()
    {
        return $this->hasOne(Vacancy::class)->withDefault();
    }

    public function photo()
    {
        return $this->hasOne(Photo::class)->withDefault();
    }

    public function cost()
    {
        return $this->hasOne(Cost::class)->withDefault();
    }

    public function scopeKeywordSearch(Builder $query, $search)
    {
        return $query->when($search, function (Builder $query, $search) {
            $query->where(function (Builder $query) use ($search) {
                $query->where('name', 'like', "%$search%")
                      ->orWhere('address', 'like', "%$search%")
                      ->orWhere('company', 'like', "%$search%")
                      ->orWhere('introduction', 'like', "%$search%")
                      ->orWhere('houserule', 'like', "%$search%")
                      ->orWhere('url', 'like', "%$search%")
                      ->orWhere('wam', 'like', "%$search%")
                      ->orWhere('id', $search);
            });
        });
    }

    public function scopeSortBy(Builder $query, $sort)
    {
        return match ($sort) {
            'updated' => $query->latest('updated_at'),
            'low' => $query->whereHas('cost', function (Builder $query) {
                $query->where('total', '>', 0);
            })->oldest('total'),
            'high' => $query->whereHas('cost', function (Builder $query) {
                $query->where('total', '>', 0);
            }
            )->latest('total'),
            'address' => $query->oldest('address'),
            'release' => $query->latest('released_at'),
            'name' => $query->oldest('name'),
            'pref' => $query->oldest('pref_id'),
            'id' => $query->latest('id'),
            default => $query->latest()
        };
    }

    public function scopeLevelSearch(Builder $query, $level)
    {
        return $query->when(filled($level), function (Builder $query, $b) use ($level) {
            $query->where('level', $level);
        });
    }

    public function scopeTypeSearch(Builder $query, $type)
    {
        return $query->when(filled($type), function (Builder $query, $b) use ($type) {
            $query->where(function (Builder $query) use ($type) {
                $query->whereHas('type', function (Builder $query) use ($type) {
                    $query->where('id', $type);
                });
            });
        });
    }

    public function scopeVacancySearch(Builder $query, $vacancy)
    {
        return $query->when(filled($vacancy), function (Builder $query, $b) use ($vacancy) {
            $query->where(function (Builder $query) use ($vacancy) {
                $query->whereHas('vacancy', function (Builder $query) use ($vacancy) {
                    $query->where('filled', $vacancy);
                });
            });
        });
    }
}
