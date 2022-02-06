<?php

namespace App\Http\Livewire;

use App\Models\Pref;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class PrefIndex extends Component
{
    use WithPagination;

    public Pref $pref;
    public ?string $area = null;

    public function render(Request $request)
    {
        return view('livewire.pref-index')->with([
            'homes' => $this->pref->homes()->with(['pref', 'type', 'photo'])
                                  ->select(['id', 'name', 'address', 'area', 'level', 'pref_id', 'type_id'])
                                  ->when(filled($this->area), function ($query) {
                                      return $query->where('area', $this->area);
                                  })
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
