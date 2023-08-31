<?php

namespace App\Livewire\Home;

use App\Livewire\Forms\CostForm;
use App\Models\Home;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Livewire\Component;

class CostEditor extends Component
{
    use AuthorizesRequests;

    public Home $home;

    public CostForm $cost;

    public function mount(): void
    {
        $this->home->cost()->firstOrCreate();

        $this->cost->setForm($this->home->cost);
    }

    public function calcTotal(): void
    {
        $this->cost->calcTotal();
    }

    /**
     * @throws AuthorizationException
     */
    public function save(): void
    {
        if (Gate::denies('admin')) {
            $this->authorize('update', $this->home);
        }

        $this->cost->save();
        $this->home->refresh();
    }

    public function render(): View
    {
        return view('livewire.home.cost-editor');
    }
}
