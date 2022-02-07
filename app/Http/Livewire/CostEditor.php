<?php

namespace App\Http\Livewire;

use App\Models\Home;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class CostEditor extends Component
{
    use AuthorizesRequests;

    public Home $home;

    protected function rules()
    {
        return collect(config('cost'))
            ->mapWithKeys(fn ($item, $key) => ['home.cost.'.$key => 'nullable'])
            ->toArray();
    }

    public function mount()
    {
        $this->home->cost()->firstOrCreate();
    }

    public function save()
    {
        if (Gate::denies('admin')) {
            $this->authorize('update', $this->home);
        }

        $this->home->cost->save();
    }

    public function render()
    {
        return view('livewire.cost-editor');
    }
}
