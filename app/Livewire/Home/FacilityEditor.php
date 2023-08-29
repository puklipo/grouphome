<?php

namespace App\Livewire\Home;

use App\Livewire\Forms\FacilityForm;
use App\Models\Home;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Livewire\Component;

/**
 * 共有設備.
 */
class FacilityEditor extends Component
{
    use AuthorizesRequests;

    public Home $home;

    public FacilityForm $facility;

    public function mount(): void
    {
        $this->home->facility()->firstOrCreate();

        $this->facility->setForm($this->home->facility);
    }

    /**
     * @throws AuthorizationException
     */
    public function updated($value, $name): void
    {
        if (Gate::denies('admin')) {
            $this->authorize('update', $this->home);
        }

        $this->facility->save();
        $this->home->refresh();
    }

    public function render(): View
    {
        return view('livewire.home.facility-editor');
    }
}
