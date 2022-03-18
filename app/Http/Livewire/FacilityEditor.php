<?php

namespace App\Http\Livewire;

use App\Models\Home;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

/**
 * 共有設備
 */
class FacilityEditor extends Component
{
    use AuthorizesRequests;

    public Home $home;

    protected function rules(): array
    {
        return collect(config('facility'))
            ->mapWithKeys(fn ($item, $key) => ['home.facility.'.$key => 'boolean'])
            ->toArray();
    }

    public function mount()
    {
        $this->home->facility()->firstOrCreate();
    }

    public function updated($value, $name)
    {
        if (Gate::denies('admin')) {
            $this->authorize('update', $this->home);
        }

        $this->home->facility->save();
    }

    public function render()
    {
        return view('livewire.facility-editor');
    }
}
