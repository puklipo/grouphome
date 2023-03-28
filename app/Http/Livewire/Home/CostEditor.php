<?php

namespace App\Http\Livewire\Home;

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

    protected function rules(): array
    {
        return collect(config('cost'))
            ->mapWithKeys(fn (
                $item,
                $key,
            ) => ['home.cost.'.$key => $key === 'message' ? 'nullable' : 'required|numeric|integer|min:0'])
            ->put('home.cost.total', 'required|numeric|integer|min:0')
            ->toArray();
    }

    protected function validationAttributes(): array
    {
        return collect(config('cost'))
            ->mapWithKeys(fn ($item, $key) => ['home.cost.'.$key => $item])
            ->put('home.cost.total', '費用合計')
            ->toArray();
    }

    public function mount(): void
    {
        $this->home->cost()->firstOrCreate();
    }

    public function calcTotal(): void
    {
        $this->fill([
            'home.cost.total' => $this->home->cost->rent
                + $this->home->cost->food
                + $this->home->cost->utilities
                + $this->home->cost->daily
                + $this->home->cost->etc,
        ]);
    }

    /**
     * @throws AuthorizationException
     */
    public function save(): void
    {
        if (Gate::denies('admin')) {
            $this->authorize('update', $this->home);
        }

        $this->validate();

        $this->home->cost->save();
    }

    public function render(): View
    {
        return view('livewire.home.cost-editor');
    }
}
