<?php

namespace App\Http\Livewire\Admin;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactsIndex extends Component
{
    use WithPagination;

    public function updatedPage($page)
    {
        //ページが変わった時に一番上にスクロール。
        $this->dispatchBrowserEvent('page-updated', ['page' => $page]);
    }

    public function render()
    {
        return view('livewire.admin.contacts-index')->with([
            'contacts' => Contact::latest()->paginate(),
        ]);
    }
}
