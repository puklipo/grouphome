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

class AkitaImport implements ToModel, WithHeadingRow, WithUpserts
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
            'id'          => $row['事業所番号'],
            'pref_id'     => Pref::where('key', 'akita')->first()->id,
            'name'        => $this->kana($row['事業所名']),
            'company'     => $this->kana($row['事業者名']),
            'address'     => $this->kana($row['事業所住所']),
            'released_at' => $row['指定年月日'],
        ]);
    }
}
