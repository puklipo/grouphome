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

    public function updatedPage($page): void
    {
        //ページが変わった時に一番上にスクロール。
        $this->dispatch('page-updated', page: $page);
    }

    public function render(): View
    {
        return view('livewire.admin.contacts-index')->with([
            'contacts' => Contact::latest()->paginate(),
        ]);
    }
}
