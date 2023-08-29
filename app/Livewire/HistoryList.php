<?php

namespace App\Livewire;

use App\Actions\History;
use Illuminate\View\View;
use Livewire\Component;

class HistoryList extends Component
{
    public function placeholder(): View
    {
        return view('livewire.history-loading');
    }

    public function render(): View
    {
        return view('livewire.history-list', [
            'homes' => app(History::class)->get(),
        ]);
    }
}
