<?php

namespace App\Imports;

use App\Models\Home;
use App\Models\Type;
use Carbon\Carbon;

class NagasakiImport extends AbstractImport
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
            callback: fn () => Carbon::parse($row['指定（更新）年月日']),
            report: false
        );

        if (empty($row['事業所番号']) || empty($row['郵便番号']) || empty($date)) {
            return null;
        }

        return new Home([
            'id' => $this->kana($row['事業所番号']),
            'pref_id' => $this->prefId(),
            'name' => $this->kana($row['事業所名称']),
            'company' => $this->kana($row['申請者名称']),
            'tel' => $this->kana($row['電話番号']),
            'address' => '長崎県'.$this->kana($row['事業所所在地']),
            'area' => $this->kana($row['市区町村'] ?? null),
            'map' => $row['Googleマップ'] ?? null,
            'url' => $row['URL'] ?? null,
            'type_id' => Type::firstWhere('type', $this->kana($row['形態（みなし含む）'] ?? null))?->id,
            'released_at' => $date,
        ]);
    }
}
