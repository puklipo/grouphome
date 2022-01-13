<?php

namespace App\Http\Livewire;

use App\Actions\History;
use Livewire\Component;

class HistoryList extends Component
{
    public bool $readyToLoad = false;

    public function ready()
    {
        $this->readyToLoad = true;
    }

    public function render()
    {
        return view('livewire.history-list', [
            'homes' => $this->readyToLoad ? app(History::class)->get() : [],
        ]);
    }
}
