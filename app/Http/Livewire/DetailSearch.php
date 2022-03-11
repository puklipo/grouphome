<?php

namespace App\Http\Livewire;

use App\Models\Home;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Support\Arr;
use Livewire\Component;
use Livewire\WithPagination;

class DetailSearch extends Component
{
    use WithPagination;

    public ?string $pref_id = null;
    public string $area = '';
    public ?array $areas = null;

    public ?string $q = null;
    public ?string $sort = 'updated';
    public int|string|null $vacancy = null;

    public array $levels = [
        0 => true,
        1 => true,
        2 => true,
        3 => true,
        4 => true,
        5 => true,
        6 => true,
    ];

    public array $types = [
        0 => true,
        1 => true,
        2 => true,
        3 => true,
        4 => true,
    ];

    public array $facilities = [];

    protected $queryString = [
        'q',
        'sort' => ['except' => 'updated'],
    ];

    public function mount()
    {
        $this->facilities = collect(config('facility'))->mapWithKeys(function ($item, $key) {
            return [$key => false];
        })->toArray();;
    }

    public function updatedPrefId($pref_id)
    {
        $this->reset('area');

        $this->areas = Home::where('pref_id', $pref_id)
                           ->whereNotNull('area')
                           ->orderBy('area')
                           ->distinct()
                           ->get('area')
                           ->pluck('area')
                           ->toArray();
    }

    public function updatedPage($page)
    {
        $this->dispatchBrowserEvent('page-updated', ['page' => $page]);
    }

    public function render()
    {
        return view('livewire.detail-search')->with([
            'homes' => Home::with(['pref', 'type', 'photo', 'cost'])
                           ->addTotalCost()
                           ->when(filled($this->pref_id), function (Builder $query) {
                               $query->where('pref_id', $this->pref_id);
                           })
                           ->when(filled($this->area), function (Builder $query) {
                               $query->where('area', $this->area);
                           })
                           ->sortBy($this->sort)
                           ->where($this->levels(...))
                           ->where($this->types(...))
                           ->where($this->facility(...))
                           ->keywordSearch($this->q)
                           ->vacancySearch($this->vacancy)
                           ->paginate()
                           ->withQueryString()
                           ->onEachSide(1),
        ]);
    }

    /**
     * 対象区分
     *
     * @param  Builder  $query
     * @return void
     */
    public function levels(Builder $query)
    {
        foreach ($this->levels as $level => $enable) {
            if ($enable) {
                $query->orWhere('level', $level);
            }
        }
    }

    /**
     * サービス類型
     *
     * @param  Builder  $query
     * @return void
     */
    public function types(Builder $query)
    {
        foreach ($this->types as $type => $enable) {
            if (! $enable) {
                continue;
            }

            if ($type === 0) {
                $query->orWhereNull('type_id');
            } else {
                $query->orWhere('type_id', $type);
            }
        }
    }

    /**
     * 共有設備
     *
     * @param  Builder  $query
     * @return void
     */
    public function facility(Builder $query)
    {
        foreach ($this->facilities as $facility => $enable) {
            if ($enable && Arr::exists(config('facility'), $facility)) {
                $query->whereHas('facility', function (Builder $query) use ($facility) {
                    $query->where($facility, true);
                });
            }
        }
    }
}
