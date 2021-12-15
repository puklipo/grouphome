<?php

namespace App\Imports;

use App\Imports\Concerns\WithImport;
use App\Imports\Concerns\WithKana;
use App\Models\Home;
use App\Models\Pref;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class MiyagiImport implements ToModel, WithHeadingRow, WithUpserts
{
    use Importable;
    use WithImport;
    use WithKana;

    /**
     * @param  array  $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Home([
            'id' => (string) $row['事業所番号'].(string) $row['枝番／連番'],
            'pref_id' => Pref::where('key', 'miyagi')->first()->id,
            'name' => $this->kana($row['共同生活住居名称']),
            'company' => $this->kana($row['申請者名称']),
            'address' => $this->kana($row['事業所所在地']),
            'released_at' => $row['指定年月日'],
        ]);
    }
}
