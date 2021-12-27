<?php

namespace App\Imports;

use App\Models\Home;
use App\Models\Type;
use Carbon\Carbon;

class ShigaImport extends AbstractImport
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

        return new Home([
            'id' => $this->kana($row['事業所番号']),
            'pref_id' => $this->prefId(),
            'name' => $this->kana($row['事業所名']),
            'company' => $this->kana($row['事業者']),
            'tel' => $this->kana($row['事業所電話番号']),
            'address' => $this->kana($row['事業所住所']),
            'area' => $this->kana($row['市区町村'] ?? null),
            'map' => $row['Googleマップ'] ?? null,
            'url' => $row['URL'] ?? null,
            'type_id' => Type::firstWhere('type', $this->kana($row['サービス種類'] ?? null))?->id,
            'released_at' => $this->kana($row['指定年月日']),
        ]);
    }
}
