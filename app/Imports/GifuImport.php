<?php

namespace App\Imports;

use App\Models\Home;

class GifuImport extends AbstractImport
{
    /**
     * @param  array  $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (empty($row['事業者番号'])) {
            return null;
        }

        return new Home([
            'id' => $this->kana($row['事業者番号']),
            'pref_id' => $this->prefId(),
            'name' => $this->kana($row['事業所名']),
            'company' => $this->kana($row['法人名']),
            'tel' => $this->kana($row['電話番号']),
            'address' => '岐阜県'.$this->kana($row['事業所所在地']),
            'map' => $row['Googleマップ'] ?? null,
            'url' => $row['URL'] ?? null,
            'released_at' => $this->kana($row['指定年月日']),
        ]);
    }
}
