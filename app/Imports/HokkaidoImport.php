<?php

namespace App\Imports;

use App\Models\Home;
use App\Models\Type;
use Illuminate\Support\Str;

class HokkaidoImport extends AbstractImport
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
            'name' => $this->kana($row['事業所名']),
            'company' => $this->kana($row['法人(設置者)名']),
            'tel' => $this->kana($row['事業所電話']),
            'address' => $this->kana($row['事業所所在地1'].$row['事業所所在地2'].$row['事業所所在地3']),
            'area' => $this->kana(Str::remove('北海道',  $row['事業所所在地1'])),
            'type_id' => Type::firstWhere('type', $this->kana($row['施設等の区分'] ?? null))?->id,
            'released_at' => $this->kana($row['指定年月日']),
        ]);
    }
}
