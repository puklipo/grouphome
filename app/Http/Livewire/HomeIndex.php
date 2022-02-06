<?php

namespace App\Http\Livewire;

use App\Models\Home;
use App\Models\Pref;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class HomeIndex extends Component
{
    use WithPagination;

    public ?Pref $pref = null;
    public ?string $area = null;

    public ?string $q = null;
    public ?string $sort = null;
    public ?int $level = null;
    public ?int $type = null;
    public ?int $vacancy = null;

    protected $queryString = [
        'q',
        'sort',
        'level',
        'type',
        'vacancy',
    ];

    public function mount(Request $request)
    {
        foreach ($this->queryString as $query) {
            $this->$query = $request->input($query);
        }
    }

    public function render()
    {
        $query = is_null($this->pref) ? Home::query() : $this->pref->homes();

        return view('livewire.home-index')->with([
            'homes' => $query->with(['pref', 'type', 'photo'])
                             ->select(['id', 'name', 'address', 'area', 'level', 'pref_id', 'type_id'])
                             ->when(filled($this->area), fn ($query) => $query->where('area', $this->area))
                             ->keywordSearch($this->q)
                             ->sortBy($this->sort)
                             ->levelSearch($this->level)
                             ->typeSearch($this->type)
                             ->vacancySearch($this->vacancy)
                             ->paginate()
                             ->withQueryString()
                             ->onEachSide(1),
        ]);
    }
}
