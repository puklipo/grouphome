<?php

namespace App\Http\Livewire\Home;

use App\Models\Home;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

/**
 * 基本情報.
 */
class BasicEditor extends Component
{
    use AuthorizesRequests;

    public Home $home;

    protected function rules(): array
    {
        return collect(config('basic'))
            ->mapWithKeys(fn ($item, $key) => ['home.'.$key => 'nullable'])
            ->toArray();
    }

    public function updated($name, $value)
    {
        if (blank($value)) {
            $this->fill([$name => null]);
        }
    }

    public function save()
    {
        $this->authorize('admin');

        $this->home->save();
    }

    public function render()
    {
        return view('livewire.home.basic-editor');
    }
}
