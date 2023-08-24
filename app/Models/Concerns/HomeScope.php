<?php

namespace App\Models\Concerns;

use App\Models\Cost;
use Illuminate\Contracts\Database\Query\Builder;

trait HomeScope
{
    /**
     * 並べ替え用のtotal cost.
     */
    public function scopeAddTotalCost(Builder $query): Builder
    {
        return $query->addSelect([
            'total' => Cost::select('total')
                ->whereColumn('home_id', 'homes.id')
                ->where('total', '>', 0),
        ]);
    }

    /**
     * キーワード検索.
     */
    public function scopeKeywordSearch(Builder $query, ?string $search): Builder
    {
        return $query->when($search, function (Builder $query, $search) {
            $query->where(function (Builder $query) use ($search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('address', 'like', "%$search%")
                    ->orWhere('company', 'like', "%$search%")
                    ->orWhere('introduction', 'like', "%$search%")
                    ->orWhere('houserule', 'like', "%$search%")
                    ->orWhere('url', 'like', "%$search%")
                    ->orWhere('wam', 'like', "%$search%")
                    ->orWhere('id', $search);
            });
        });
    }

    /**
     * 並べ替え.
     */
    public function scopeSortBy(Builder $query, ?string $sort): Builder
    {
        return match ($sort) {
            'updated' => $query->latest('updated_at'),
            'low' => $query->whereHas('cost', function (Builder $query) {
                $query->where('total', '>', 0);
            })->oldest('total'),
            'high' => $query->whereHas('cost', function (Builder $query) {
                $query->where('total', '>', 0);
            }
            )->latest('total'),
            'address' => $query->oldest('address'),
            'release' => $query->latest('released_at'),
            'name' => $query->oldest('name'),
            'pref' => $query->oldest('pref_id'),
            'id' => $query->latest('id'),
            default => $query->latest()
        };
    }

    /**
     * 対象区分で検索.
     */
    public function scopeLevelSearch(Builder $query, ?string $level): Builder
    {
        return $query->when(filled($level), function (Builder $query, $b) use ($level) {
            $query->where('level', $level);
        });
    }

    /**
     * サービス類型で検索.
     */
    public function scopeTypeSearch(Builder $query, ?string $type): Builder
    {
        return $query->when(filled($type), function (Builder $query, $b) use ($type) {
            $query->where(function (Builder $query) use ($type) {
                $query->whereHas('type', function (Builder $query) use ($type) {
                    $query->where('id', $type);
                });
            });
        });
    }

    /**
     * 空室で検索.
     *
     * @param  string|null  $vacancy 指定しない"", 空室あり"0", 満室"1"
     */
    public function scopeVacancySearch(Builder $query, ?string $vacancy): Builder
    {
        return $query->when(filled($vacancy), function (Builder $query, $b) use ($vacancy) {
            $query->where(function (Builder $query) use ($vacancy) {
                $query->whereHas('vacancy', function (Builder $query) use ($vacancy) {
                    $query->where('filled', $vacancy);
                });
            });
        });
    }
}
