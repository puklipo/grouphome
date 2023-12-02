<?php

namespace App\Models;

use App\Casts\Telephone;
use App\Models\Concerns\HomeScope;
use App\Support\IndexNow;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;
use MatanYadaev\EloquentSpatial\Objects\Point;
use MatanYadaev\EloquentSpatial\Traits\HasSpatial;

use function Illuminate\Events\queueable;

/**
 * @method static \MatanYadaev\EloquentSpatial\SpatialBuilder query()
 *
 * @property \MatanYadaev\EloquentSpatial\Objects\Point $location
 *
 * @mixin IdeHelperHome
 */
class Home extends Model
{
    use HasFactory;
    use HasSpatial;
    use HomeScope;

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 20;

    protected $casts = [
        'released_at' => 'date:Y-m-d',
        'location' => Point::class,
        'tel' => Telephone::class,
    ];

    public $incrementing = false;

    protected $fillable = [
        'id',
        'pref_id',
        'name',
        'name_kana',
        'company',
        'tel',
        'address',
        'area',
        'map',
        'location',
        'url',
    ];

    protected $with = ['pref', 'type', 'photo'];

    protected static function booted(): void
    {
        static::created(queueable(function (Home $home) {
            info('IndexNow: '.IndexNow::submit(route('home.show', $home)));
        }));

        //        static::updated(queueable(function (Home $home) {
        //            info('IndexNow: '.IndexNow::submit(route('home.show', $home)));
        //        }));
    }

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
