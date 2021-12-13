<?php

namespace App\Imports;

use App\Models\Home;
use App\Models\Pref;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use App\Imports\Concerns\WithImport;

class IwateImport implements ToModel, WithHeadingRow, WithUpserts
{
    use Importable;
    use WithImport;

    /**
     * @param  array  $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Home([
            'id' => $row['事業所番号'],
            'pref_id' => Pref::where('key', 'iwate')->first()->id,
            'name' => $row['住居名'],
            'company' => $row['法人名'],
            'address' => $row['住所'] ?? '',
            'released_at' => $row['事業所指定日'],
        ]);
    }
}
