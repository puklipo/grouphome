<?php

namespace App\Livewire\Home;

use App\Models\Home;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Livewire\Attributes\Rule;
use Livewire\Component;

class IntroductionEditor extends Component
{
    use AuthorizesRequests;

    public Home $home;

    #[Rule('string|nullable')]
    public ?string $introduction;

    public function mount(): void
    {
        $this->introduction = $this->home->introduction;
    }

    public function updated($name, $value): void
    {
        if ($name === 'introduction' && blank($value)) {
            $this->fill(['introduction' => null]);
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
            'introduction' => $this->introduction,
        ])->save();
    }

    public function render(): View
    {
        return view('livewire.home.introduction-editor');
    }
}
