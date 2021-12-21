<?php

namespace App\Imports;

use App\Models\Home;

class ToyamaImport extends AbstractImport
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
            'name' => $this->kana($row['事業所名称']),
            'company' => $this->kana($row['運営主体']),
            'tel' => $this->kana($row['電話番号']),
            'address' => '富山県'.$this->kana($row['事業所所在地']),
            'area' => null,
            'map' => $row['Googleマップ'] ?? null,
            'url' => $row['URL'] ?? null,
            'released_at' => $this->kana($row['事業開始年月日']),
        ]);
    }
}
