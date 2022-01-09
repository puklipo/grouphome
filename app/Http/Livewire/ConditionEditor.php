<?php

namespace App\Http\Livewire;

use App\Models\Home;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class ConditionEditor extends Component
{
    use AuthorizesRequests;

    public Home $home;

    protected function rules()
    {
        return collect(config('condition'))
            ->mapWithKeys(fn ($item, $key) => ['home.condition.'.$key => 'boolean'])
            ->toArray();
    }

    public function mount()
    {
        $this->home->condition()->firstOrCreate();
    }

    public function updated($value, $name)
    {
        if (Gate::denies('admin')) {
            $this->authorize('update', $this->home);
        }

        $this->home->condition->save();
    }

    public function render()
    {
        return view('livewire.condition-editor');
    }
}
