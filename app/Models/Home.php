<?php

namespace App\Models;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;
use MatanYadaev\EloquentSpatial\Objects\Point;
use MatanYadaev\EloquentSpatial\SpatialBuilder;
use MatanYadaev\EloquentSpatial\Traits\HasSpatial;

/**
 * @property Point $location
 * @method static SpatialBuilder query()
 * @mixin IdeHelperHome
 */
class Home extends Model
{
    use HasFactory;
    use HasSpatial;

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 20;

    protected $casts = [
        'released_at' => 'date:Y-m-d',
        'location' => Point::class,
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
        'location',
        'url',
        'wam',
        'level',
        'type_id',
        'released_at',
    ];

    protected $with = ['pref', 'type', 'photo'];

    public function pref(): BelongsTo
    {
        return $this->belongsTo(Pref::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function equipment(): HasOne
    {
        return $this->hasOne(Equipment::class)->withDefault();
    }

    public function facility(): HasOne
    {
        return $this->hasOne(Facility::class)->withDefault();
    }

    public function condition(): HasOne
    {
        return $this->hasOne(Condition::class)->withDefault();
    }

    public function vacancy(): HasOne
    {
        return $this->hasOne(Vacancy::class)->withDefault();
    }

    public function photo(): HasOne
    {
        return $this->hasOne(Photo::class)->withDefault();
    }

    public function cost(): HasOne
    {
        return $this->hasOne(Cost::class)->withDefault();
    }

    public function scopeAddTotalCost(Builder $query): Builder
    {
        return $query->addSelect([
            'total' => Cost::select('total')
                           ->whereColumn('home_id', 'homes.id')
                           ->where('total', '>', 0),
        ]);
    }

    public function scopeKeywordSearch(Builder $query, ?string $search): Builder
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

    public function scopeSortBy(Builder $query, ?string $sort): Builder
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

    public function scopeLevelSearch(Builder $query, ?string $level): Builder
    {
        return $query->when(filled($level), function (Builder $query, $b) use ($level) {
            $query->where('level', $level);
        });
    }

    public function scopeTypeSearch(Builder $query, ?string $type): Builder
    {
        return $query->when(filled($type), function (Builder $query, $b) use ($type) {
            $query->where(function (Builder $query) use ($type) {
                $query->whereHas('type', function (Builder $query) use ($type) {
                    $query->where('id', $type);
                });
            });
        });
    }

    public function scopeVacancySearch(Builder $query, ?string $vacancy): Builder
    {
        return $query->when(filled($vacancy), function (Builder $query, $b) use ($vacancy) {
            $query->where(function (Builder $query) use ($vacancy) {
                $query->whereHas('vacancy', function (Builder $query) use ($vacancy) {
                    $query->where('filled', $vacancy);
                });
            });
        });
    }

    protected function description(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Str::of($this->introduction ?? $this->address)
                                   ->replace(PHP_EOL, ' ')
                                   ->limit(200)
                                   ->trim()
                                   ->value()
        );
    }
}
