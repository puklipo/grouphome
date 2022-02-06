<?php

namespace App\Http\Livewire;

use App\Models\Home;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class HomeIndex extends Component
{
    use WithPagination;

    public function render(Request $request)
    {
        return view('livewire.home-index')->with([
            'homes' => Home::with(['pref', 'type', 'photo'])
                           ->select(['id', 'name', 'address', 'area', 'level', 'pref_id', 'type_id'])
                           ->keywordSearch($request->input('q'))
                           ->sortBy($request->input('sort'))
                           ->levelSearch($request->input('level'))
                           ->typeSearch($request->input('type'))
                           ->vacancySearch($request->input('vacancy'))
                           ->paginate()
                           ->withQueryString()
                           ->onEachSide(1),
        ]);
    }
}
