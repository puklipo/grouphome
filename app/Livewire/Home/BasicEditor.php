<?php

namespace App\Livewire\Home;

use App\Livewire\Forms\BasicForm;
use App\Models\Home;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\View\View;
use Livewire\Component;

/**
 * 基本情報.
 */
class BasicEditor extends Component
{
    use AuthorizesRequests;

    public Home $home;

    public BasicForm $form;

    public function mount(): void
    {
        $this->form->setForm($this->home);
    }

    public function updated($name, $value): void
    {
        if (blank($value)) {
            $this->form->$name = null;
        }
    }

    /**
     * @throws AuthorizationException
     */
    public function save(): void
    {
        $this->authorize('admin');

        $this->form->save();
    }

    public function render(): View
    {
        return view('livewire.home.basic-editor');
    }
}
