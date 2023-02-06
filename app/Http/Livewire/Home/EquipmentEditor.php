<?php

namespace App\Http\Livewire\Home;

use App\Models\Home;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

/**
 * 居室設備.
 */
class EquipmentEditor extends Component
{
    use AuthorizesRequests;

    public Home $home;

    protected function rules(): array
    {
        return collect(config('equipment'))
            ->mapWithKeys(fn ($item, $key) => ['home.equipment.'.$key => 'boolean'])
            ->toArray();
    }

    public function mount()
    {
        $this->home->equipment()->firstOrCreate();
    }

    public function updated($value, $name)
    {
        if (Gate::denies('admin')) {
            $this->authorize('update', $this->home);
        }

        $this->home->equipment->save();
    }

    public function render()
    {
        return view('livewire.home.equipment-editor');
    }
}
