<?php

namespace App\Livewire;

use App\Models\Home;
use Livewire\Attributes\Computed;
use Livewire\Component;
use MatanYadaev\EloquentSpatial\Objects\Point;

class LocationIndex extends Component
{
    protected mixed $homes = [];

    /**
     * @var bool 位置情報が有効
     */
    public bool $geo = true;

    protected float $latitude;

    protected float $longitude;

    public function load(float $latitude, float $longitude): void
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;

        unset($this->homes);
    }

    #[Computed]
    public function homes()
    {
        if (empty($this->latitude)) {
            return [];
        }

        $point = new Point($this->latitude, $this->longitude, (int) config('grouphome.geo.srid'));

        return rescue(
            callback: fn () => Home::query()
                ->with(['cost'])
                ->whereNotNull('location')
                ->withDistanceSphere('location', $point)
                ->orderByDistanceSphere('location', $point)
                ->limit(50)
                ->get(),
            rescue: []
        );
    }
}
