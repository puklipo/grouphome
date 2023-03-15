<?php

namespace App\Http\Livewire\Home;

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

    protected function rules(): array
    {
        return collect(config('equipment'))
            ->mapWithKeys(fn ($item, $key) => ['home.equipment.'.$key => 'boolean'])
            ->toArray();
    }

    public function mount(): void
    {
        $this->home->equipment()->firstOrCreate();
    }

    /**
     * @throws AuthorizationException
     */
    public function updated($value, $name): void
    {
        if (Gate::denies('admin')) {
            $this->authorize('update', $this->home);
        }

        $this->home->equipment->save();
    }

    public function render(): View
    {
        return view('livewire.home.equipment-editor');
    }
}
