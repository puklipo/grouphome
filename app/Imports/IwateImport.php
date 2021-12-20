<?php

namespace App\Imports;

use App\Imports\Concerns\WithImport;
use App\Imports\Concerns\WithKana;
use App\Models\Home;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class IwateImport implements ToModel, WithHeadingRow, WithUpserts
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
            'id' => $row['事業所番号'],
            'pref_id' => $this->prefId(),
            'name' => $this->kana($row['住居名']),
            'company' => $this->kana($row['法人名']),
            'tel' => $this->kana($row['電話番号']),
            'address' => $this->kana($row['住所'] ?? ''),
            'released_at' => $row['事業所指定日'],
        ]);
    }
}
