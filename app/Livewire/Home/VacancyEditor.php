<?php

namespace App\Livewire\Home;

use App\Livewire\Forms\VacancyForm;
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

    public VacancyForm $vacancy;

    public function mount(): void
    {
        $this->home->vacancy()->firstOrCreate();

        $this->vacancy->setForm($this->home->vacancy);
    }

    /**
     * @throws AuthorizationException
     */
    public function save(): void
    {
        if (Gate::denies('admin')) {
            $this->authorize('update', $this->home);
        }

        $this->vacancy->save();
        $this->home->refresh();
    }

    public function render(): View
    {
        return view('livewire.home.vacancy-editor');
    }
}
