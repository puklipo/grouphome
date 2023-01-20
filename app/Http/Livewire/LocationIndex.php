<?php

namespace App\Http\Livewire;

use App\Models\Home;
use Livewire\Component;
use MatanYadaev\EloquentSpatial\Objects\Point;

class LocationIndex extends Component
{
    protected mixed $homes = [];

    /**
     * @var bool 位置情報が有効
     */
    public bool $geo = true;

    public function load(float $latitude, float $longitude)
    {
        $point = new Point($latitude, $longitude, (int) config('grouphome.geo.srid'));

        $this->homes = rescue(
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

    public function render()
    {
        return view('livewire.location-index')->with(['homes' => $this->homes]);
    }
}
