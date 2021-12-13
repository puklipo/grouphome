<?php

namespace App\Imports;

use App\Imports\Concerns\WithImport;
use App\Models\Home;
use App\Models\Pref;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class HokkaidoImport implements ToModel, WithHeadingRow, WithUpserts
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
            'pref_id' => Pref::where('key', 'hokkaido')->first()->id,
            'name' => $row['事業所名'],
            'company' => $row['法人(設置者)名'],
            'address' => $row['事業所所在地1'].$row['事業所所在地2'].$row['事業所所在地3'],
            'released_at' => $row['指定年月日'],
        ]);
    }
}
