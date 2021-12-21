<?php

namespace App\Imports;

use App\Models\Home;
use Illuminate\Support\Str;

class TochigiImport extends AbstractImport
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

        if (! Str::contains($row['指定年月日'], '/')) {
            return null;
        }

        return new Home([
            'id' => $this->kana($row['事業所番号']),
            'pref_id' => $this->prefId(),
            'name' => $this->kana($row['共同生活住居名']),
            'company' => $this->kana($row['申請者名称']),
            'tel' => null,
            'address' => '栃木県'.$this->kana($row['共同生活住居住所']),
            'map' => $row['Googleマップ'] ?? null,
            'url' => $row['URL'] ?? null,
            'released_at' => $this->kana($row['指定年月日']),
        ]);
    }
}
