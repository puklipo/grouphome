<?php

namespace App\Imports;

use App\Imports\Concerns\WithImport;
use App\Models\Home;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class AomoriImport implements ToModel, WithHeadingRow, WithUpserts
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
            'id'          => Str::replace('-', '', $row['事業所番号']),
            'name'        => $row['事業所名'],
            'company'     => $row['設置者'],
            'address'     => '青森県'.$row['事業所住所'],
            'released_at' => $row['指定年月日'],
        ]);
    }
}
