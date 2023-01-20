<?php

namespace App\Http\Livewire;

use App\Models\Home;
use Livewire\Component;
use MatanYadaev\EloquentSpatial\Objects\Point;

class LocationIndex extends Component
{
    public float $latitude = 0;
    public float $longitude = 0;

    /**
     * @var bool 位置情報が有効
     */
    public bool $geo = false;

    /**
     * @var bool ロード中
     */
    public bool $loading = true;

    public function render()
    {
        if ($this->loading || ! $this->geo) {
            $homes = [];
        } else {
            $homes = Home::query()
                         ->with(['pref', 'type', 'photo', 'cost'])
                         ->whereNotNull('location')
                         ->withDistanceSphere('location', new Point($this->latitude, $this->longitude))
                         ->orderByDistanceSphere('location', new Point($this->latitude, $this->longitude))
                         ->limit(50)
                         ->get();
        }

        return view('livewire.location-index')->with(compact('homes'));
    }
}
