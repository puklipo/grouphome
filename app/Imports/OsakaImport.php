<?php

namespace App\Imports;

use App\Models\Home;

class OsakaImport extends AbstractImport
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
            'company' => $this->kana($row['法人名称']),
            'tel' => $this->kana($row['事業所電話番号']),
            'address' => '大阪府'.$this->kana($row['事業所所在地']),
            'released_at' => $this->kana($row['指定日']),
        ]);
    }
}
