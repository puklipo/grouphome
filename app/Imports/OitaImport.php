<?php

namespace App\Imports;

use App\Models\Home;

class OitaImport extends AbstractImport
{
    /**
     * @param  array  $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (empty($row['事業所番号']) || empty($row['指定年月日'])) {
            return null;
        }

        return new Home([
            'id' => $this->kana($row['事業所番号']),
            'pref_id' => $this->prefId(),
            'name' => $this->kana($row['事業所名称']),
            'company' => $this->kana($row['申請者名称']),
            'tel' => $this->kana($row['電話番号']),
            'address' => $this->kana($row['事業所所在地']),
            'area' => $this->kana($row['市区町村'] ?? null),
            'map' => $row['Googleマップ'] ?? null,
            'url' => $row['URL'] ?? null,
            'released_at' => $this->kana($row['指定年月日']),
        ]);
    }
}
