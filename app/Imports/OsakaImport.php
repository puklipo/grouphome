<?php

namespace App\Imports;

use App\Imports\Concerns\WithImport;
use App\Models\Home;
use App\Models\Pref;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class OsakaImport implements ToModel, WithHeadingRow, WithUpserts
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
            'pref_id' =>Pref::where('key', 'osaka')->first()->id,
            'name' => $row['事業所名称'],
            'company' => $row['法人名称'],
            'address' => $row['事業所所在地'],
            'released_at' => $row['指定日'],
        ]);
    }
}
