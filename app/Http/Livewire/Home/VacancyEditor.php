<?php

namespace App\Http\Livewire\Home;

use App\Models\Home;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Livewire\Component;

/**
 * 空室情報.
 */
class VacancyEditor extends Component
{
    use AuthorizesRequests;

    public Home $home;

    protected array $rules = [
        'home.vacancy.filled' => 'boolean',
        'home.vacancy.message' => 'string|nullable',
    ];

    public function mount(): void
    {
        $this->home->vacancy()->firstOrCreate();
    }

    /**
     * @throws AuthorizationException
     */
    public function save(): void
    {
        if (Gate::denies('admin')) {
            $this->authorize('update', $this->home);
        }

        $this->home->vacancy->save();
    }

    public function render(): View
    {
        return view('livewire.home.vacancy-editor');
    }
}
