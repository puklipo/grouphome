<?php

namespace App\Livewire\Home;

use App\Models\Home;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Livewire\Component;

class IntroductionEditor extends Component
{
    use AuthorizesRequests;

    public Home $home;

    protected array $rules = [
        'home.introduction' => 'string|nullable',
    ];

    public function updated($name, $value): void
    {
        if ($name === 'home.introduction' && blank($value)) {
            $this->fill(['home.introduction' => null]);
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

        $this->home->save();
    }

    public function render(): View
    {
        return view('livewire.home.introduction-editor');
    }
}
