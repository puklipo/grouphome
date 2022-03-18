<?php

namespace App\Http\Livewire;

use App\Models\Home;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

/**
 * 空室情報
 */
class VacancyEditor extends Component
{
    use AuthorizesRequests;

    public Home $home;

    protected array $rules = [
        'home.vacancy.filled' => 'boolean',
        'home.vacancy.message' => 'string|nullable',
    ];

    public function mount()
    {
        $this->home->vacancy()->firstOrCreate();
    }

    public function save()
    {
        if (Gate::denies('admin')) {
            $this->authorize('update', $this->home);
        }

        $this->home->vacancy->save();
    }

    public function render()
    {
        return view('livewire.vacancy-editor');
    }
}
