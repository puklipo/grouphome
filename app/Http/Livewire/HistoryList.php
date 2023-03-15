<?php

namespace App\Http\Livewire;

use App\Actions\History;
use Illuminate\View\View;
use Livewire\Component;

class HistoryList extends Component
{
    public bool $ready = false;

    public function ready(): void
    {
        $this->ready = true;
    }

    public function render(): View
    {
        return view('livewire.history-list', [
            'homes' => $this->ready ? app(History::class)->get() : [],
        ]);
    }
}
