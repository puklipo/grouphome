<?php

namespace App\Livewire\Home;

use App\Livewire\Forms\EquipmentForm;
use App\Models\Home;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Livewire\Component;

/**
 * 居室設備.
 */
class EquipmentEditor extends Component
{
    use AuthorizesRequests;

    public Home $home;

    public EquipmentForm $equipment;

    public function mount(): void
    {
        $this->home->equipment()->firstOrCreate();

        $this->equipment->setForm($this->home->equipment);
    }

    /**
     * @throws AuthorizationException
     */
    public function updated($value, $name): void
    {
        if (Gate::denies('admin')) {
            $this->authorize('update', $this->home);
        }

        $this->equipment->save();
        $this->home->refresh();
    }

    public function render(): View
    {
        return view('livewire.home.equipment-editor');
    }
}
