<?php

namespace App\Actions;

use App\Models\Home;
use Illuminate\Support\Collection;

class History
{
    public function add(Home $home)
    {
        $history = collect(session('history', []))
            ->prepend($home->id)
            ->unique()
            ->take(50);

        session(['history' => $history->toArray()]);
    }

    public function get(): Collection
    {
        return collect(session('history', []))
            ->map(fn ($history) => Home::with(['pref', 'type'])->find($history));
    }
}
