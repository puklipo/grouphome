<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\AdminHomeForm;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.main')]
#[Title('グループホームを一時的に追加')]
class HomeCreateForm extends Component
{
    public AdminHomeForm $form;

    /**
     * @throws ValidationException
     * @throws AuthorizationException
     */
    public function submit(): void
    {
        $this->authorize('admin');

        $home = $this->form->create();

        $this->redirectRoute('home.show', $home);
    }

    public function render()
    {
        return view('livewire.admin.home-create-form');
    }
}
