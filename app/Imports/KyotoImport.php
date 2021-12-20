<?php

namespace App\Imports;

use App\Imports\Concerns\WithImport;
use App\Imports\Concerns\WithKana;
use App\Models\Home;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class KyotoImport implements ToModel, WithHeadingRow, WithUpserts
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
            'name' => $this->kana($row['事業所名']),
            'company' => $this->kana($row['法人(設置者)名']),
            'tel' => $this->kana($row['事業所電話']),
            'address' => $this->kana($row['事業所所在地1'].$row['事業所所在地2'].$row['事業所所在地3']),
            'area' => Str::remove('京都府', $row['事業所所在地1']) ?? null,
            'map' => $row['Googleマップ'] ?? null,
            'url' => $row['URL'] ?? null,
            'released_at' => $row['指定年月日'],
        ]);
    }
}
