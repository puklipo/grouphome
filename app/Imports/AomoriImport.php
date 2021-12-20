<?php

namespace App\Imports;

use App\Models\Home;
use Illuminate\Support\Str;

class AomoriImport extends AbstractImport
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
            'id' => Str::replace('-', '', $row['事業所番号']),
            'pref_id' => $this->prefId(),
            'name' => $this->kana($row['事業所名']),
            'company' => $this->kana($row['設置者']),
            'tel' => $this->kana($row['電話番号']),
            'address' => $this->kana('青森県'.$row['事業所住所']),
            'released_at' => $row['指定年月日'],
        ]);
    }
}
