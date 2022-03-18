<?php

namespace App\Actions;

use App\Models\Home;
use Illuminate\Support\Collection;

class History
{
    public function add(Home $home): void
    {
        $history = collect(session('history', []))
            ->prepend($home->id)
            ->unique()
            ->take(50)
            ->values()
            ->toArray();

        session(compact('history'));
    }

    public function get(): Collection
    {
        return collect(session('history', []))
            ->map(fn ($history) => Home::find($history))
            ->reject(fn ($history) => is_null($history));
    }
}
