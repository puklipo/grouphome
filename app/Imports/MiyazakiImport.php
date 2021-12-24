<?php

namespace App\Imports;

use App\Models\Home;
use Carbon\Carbon;

class MiyazakiImport extends AbstractImport
{
    /**
     * @param  array  $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        /**
         * @var Carbon $date
         */
        $date = rescue(
            callback: fn () => Carbon::createFromFormat('Y.m.d', $row['指定年月']),
            report: false
        );

        if (empty($row['事業所番号']) || empty($date)) {
            return null;
        }

        return new Home([
            'id' => $this->kana($row['事業所番号']),
            'pref_id' => $this->prefId(),
            'name' => $this->kana($row['共同生活住居名称']),
            'company' => $this->kana($row['法人名']),
            'tel' => $this->kana($row['電話番号'] ?? null),
            'address' => '宮崎県'.$this->kana($row['共同生活住居所在地']),
            'area' => $this->kana($row['市区町村'] ?? null),
            'map' => $row['Googleマップ'] ?? null,
            'url' => $row['URL'] ?? null,
            'released_at' => $date,
        ]);
    }
}
