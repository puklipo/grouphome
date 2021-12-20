<?php

namespace App\Imports;

use App\Models\Home;

class IwateImport extends AbstractImport
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
            'id' => $row['事業所番号'],
            'pref_id' => $this->prefId(),
            'name' => $this->kana($row['住居名']),
            'company' => $this->kana($row['法人名']),
            'tel' => $this->kana($row['電話番号']),
            'address' => $this->kana($row['住所'] ?? ''),
            'released_at' => $row['事業所指定日'],
        ]);
    }
}
