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

class SagaImport implements ToModel, WithHeadingRow, WithUpserts
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
            'id' => trim($row['事業所番号']),
            'pref_id' => $this->prefId(),
            'name' => $this->kana($row['事業所名']),
            'company' => $this->kana($row['法人(設置者)名']),
            'tel' => $this->kana($row['電話番号']),
            'address' => $this->kana('佐賀県'.$row['所在市町'].$row['所在地']),
            'area' => $this->kana($row['所在市町']),
            'released_at' => $row['指定年月日'],
        ]);
    }
}
