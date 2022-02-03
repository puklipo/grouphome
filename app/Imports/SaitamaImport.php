<?php

namespace App\Imports;

use App\Models\Home;
use App\Models\Type;
use Illuminate\Support\Str;

class SaitamaImport extends AbstractImport
{
    /**
     * @param  array  $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (empty($row['事業所番号'])) {
            return null;
        }

        if (! Str::contains($row['異動年月日'], '/')) {
            return null;
        }

        return new Home([
            'id' => $this->kana($row['事業所番号']),
            'pref_id' => $this->prefId(),
            'name' => $this->kana($row['共同生活住居名称']),
            'company' => $this->kana($row['申請者名称']),
            'tel' => $this->kana($row['事業所電話番号']),
            'address' => $this->kana($row['共同生活住居所在地']),
            'map' => $row['Googleマップ'] ?? null,
            'url' => $row['URL'] ?? null,
            'type_id' => Type::firstWhere('type', $this->kana(Str::after($row['施設等の区分'] ?? null, ':')))?->id,
            'released_at' => $this->kana($row['異動年月日']),
        ]);
    }
}
