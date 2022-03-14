<?php

namespace App\Http\Livewire;

use App\Models\Home;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class HouseruleEditor extends Component
{
    use AuthorizesRequests;

    public Home $home;

    protected array $rules = [
        'home.houserule' => 'string|nullable',
    ];

    public function updated($name, $value)
    {
        if ($name === 'home.houserule' && blank($value)) {
            $this->fill(['home.houserule' => null]);
        }
    }

    public function save()
    {
        if (Gate::denies('admin')) {
            $this->authorize('update', $this->home);
        }

        $this->home->save();
    }

    public function render()
    {
        return view('livewire.houserule-editor');
    }
}
