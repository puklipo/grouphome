<?php

namespace App\Imports;

use App\Models\Home;

class OkinawaImport extends AbstractImport
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
            'id' => trim($row['事業所番号']),
            'pref_id' => $this->prefId(),
            'name' => $this->kana($row['事業所－名称']),
            'company' => $this->kana($row['申請者－名称']),
            'tel' => $this->kana($row['事業所－電話番号']),
            'address' => $this->kana($row['事業所－住所']),
            'released_at' => $row['指定年月日'],
        ]);
    }
}
