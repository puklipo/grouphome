<?php

namespace App\Imports;

use App\Models\Home;

class MiyagiImport extends AbstractImport
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
            'id' => $this->kana($row['事業所番号'].$row['枝番／連番']),
            'pref_id' => $this->prefId(),
            'name' => $this->kana($row['共同生活住居名称']),
            'company' => $this->kana($row['申請者名称']),
            'address' => $this->kana($row['事業所所在地']),
            'area' => $this->kana($row['事業所市町村名']),
            'map' => $row['Googleマップ'] ?? null,
            'url' => $row['URL'] ?? null,
            'released_at' => $this->kana($row['指定年月日']),
        ]);
    }
}
