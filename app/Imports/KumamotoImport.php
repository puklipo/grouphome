<?php

namespace App\Imports;

use App\Models\Home;
use App\Models\Type;
use Carbon\Carbon;

class KumamotoImport extends AbstractImport
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
            'id' => $this->kana(trim($row['事業所番号']).$row['枝番']),
            'pref_id' => $this->prefId(),
            'name' => $this->kana($row['共同生活住居名称']),
            'company' => $this->kana($row['事業者名称']),
            'tel' => $this->kana($row['電話番号']),
            'address' => $this->kana('熊本県'.$row['住　所']),
            'area' => $this->kana($row['所在地']),
            'type_id' => Type::firstWhere('type', $this->kana($row['施設等の区分'] ?? null))?->id,
            'released_at' => Carbon::createFromFormat('Y年m月d日', $this->kana($row['指定年月日'])),
        ]);
    }
}
