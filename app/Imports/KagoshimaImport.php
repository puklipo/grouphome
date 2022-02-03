<?php

namespace App\Imports;

use App\Models\Home;
use Illuminate\Support\Str;

class KagoshimaImport extends AbstractImport
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
            'id' => $this->kana(trim($row['事業所番号'])),
            'pref_id' => $this->prefId(),
            'name' => $this->kana($row['事業所の名称']),
            'company' => $this->kana($row['法人の名称']),
            'tel' => $this->kana($row['事業所電話番号']),
            'address' => $this->kana($row['事業所住所（市区町村）'].$row['事業所住所（番地以降）']),
            'area' => $this->kana(Str::remove('鹿児島県', $row['事業所住所（市区町村）'])),
            'url' => $row['事業所URL'],
            'level' => $this->kana($row['対象区分'] ?? 0),
            'type_id' => $row['類型'] ?? null,
        ]);
    }
}
