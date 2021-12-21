<?php

namespace App\Imports;

use App\Models\Home;

class IshikawaImport extends AbstractImport
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
            'name' => $this->kana($row['共同生活住居名称']),
            'company' => $this->kana($row['法人名称']),
            'tel' => $this->kana($row['運営法人電話番号']),
            'address' => '石川県'.$this->kana($row['所在地[1]'].$row['所在地[2]']),
            'area' => $this->kana($row['所在地[1]'] ?? null),
            'map' => $row['Googleマップ'] ?? null,
            'url' => $row['URL'] ?? null,
            'released_at' => $this->kana($row['設置年月日']),
        ]);
    }
}
