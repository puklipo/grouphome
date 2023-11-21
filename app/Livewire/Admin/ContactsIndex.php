<?php

namespace App\Livewire\Admin;

use App\Models\Contact;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * 問い合わせ一覧.
 */
class ContactsIndex extends Component
{
    use WithPagination;

    public function render(): View
    {
        return view('livewire.admin.contacts-index')->with([
            'contacts' => Contact::latest()->paginate(),
        ]);
    }
}
