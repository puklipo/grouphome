<?php

namespace App\Http\Livewire;

use App\Actions\History;
use Livewire\Component;

class HistoryList extends Component
{
    public bool $ready = false;

    public function ready()
    {
        $this->ready = true;
    }

    public function render()
    {
        return view('livewire.history-list', [
            'homes' => $this->ready ? app(History::class)->get() : [],
        ]);
    }
}
