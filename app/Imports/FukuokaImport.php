<?php

namespace App\Imports;

use App\Imports\Concerns\WithImport;
use App\Models\Home;
use App\Models\Pref;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class FukuokaImport implements ToModel, WithHeadingRow, WithUpserts
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
            'id'          => $row['事業所番号'],
            'pref_id' => Pref::where('key', 'fukuoka')->first()->id,
            'name'        => $row['事業所－名称'],
            'company'     => $row['申請者－名称'],
            'address'     => $row['事業所－住所'],
            'released_at' => $row['指定年月日'],
        ]);
    }
}
