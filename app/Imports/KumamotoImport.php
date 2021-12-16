<?php

namespace App\Imports;

use App\Imports\Concerns\WithImport;
use App\Imports\Concerns\WithKana;
use App\Models\Home;
use App\Models\Pref;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class KumamotoImport implements ToModel, WithHeadingRow, WithUpserts
{
    use Importable;
    use WithImport;
    use WithKana;

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
            'id' => trim($row['事業所番号']).$row['枝番'],
            'pref_id' => $this->prefId(),
            'name' => $this->kana($row['共同生活住居名称']),
            'company' => $this->kana($row['事業者名称']),
            'tel' => $this->kana($row['電話番号']),
            'address' => $this->kana('熊本県'.$row['住　所']),
            'area' => $this->kana($row['所在地']),
            'released_at' => Carbon::createFromFormat('Y年m月d日', $row['指定年月日']),
        ]);
    }
}
