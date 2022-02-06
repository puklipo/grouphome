<?php

namespace App\Http\Livewire;

use App\Models\Home;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class BasicEditor extends Component
{
    use AuthorizesRequests;

    public Home $home;

    protected function rules()
    {
        return collect(config('basic'))
            ->mapWithKeys(fn ($item, $key) => ['home.'.$key => 'nullable'])
            ->toArray();
    }

    public function save()
    {
        $this->authorize('admin');

        $this->home->save();
    }

    public function render()
    {
        return view('livewire.basic-editor');
    }
}
