<?php

namespace App\Livewire\Home;

use App\Models\Home;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Livewire\Attributes\Rule;
use Livewire\Component;

class HouseruleEditor extends Component
{
    use AuthorizesRequests;

    public Home $home;

    #[Rule('string|nullable')]
    public ?string $houserule;

    public function mount(): void
    {
        $this->houserule = $this->home->houserule;
    }

    public function updated($name, $value): void
    {
        if ($name === 'houserule' && blank($value)) {
            $this->fill(['houserule' => null]);
        }
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

        $this->home->forceFill([
            'houserule' => $this->houserule,
        ])->save();
    }

    public function render(): View
    {
        return view('livewire.home.houserule-editor');
    }
}
