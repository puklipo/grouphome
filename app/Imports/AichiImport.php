<?php

namespace App\Imports;

use App\Models\Home;

class AichiImport extends AbstractImport
{
    /**
     * @param  array  $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (empty($row['障害福祉サービス等事業所番号'])) {
            return null;
        }

        return new Home([
            'id' => $this->kana($row['障害福祉サービス等事業所番号']),
            'pref_id' => $this->prefId(),
            'name' => $this->kana($row['施設・サービス名']),
            'company' => $this->kana($row['法人の名称']),
            'tel' => $this->kana($row['電話番号']),
            'address' => $this->kana($row['所在地']),
            'area' => '名古屋市'.$this->kana($row['タグ']).'区',
            'released_at' => $this->kana($row['指定年月日']),
        ]);
    }
}
