<?php

namespace App\Imports;

use App\Imports\Concerns\WithKana;
use App\Models\Home;
use App\Models\Pref;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;

class WamImport implements OnEachRow, WithHeadingRow
{
    use Importable;
    use WithKana;

    public function onRow(Row $row)
    {
        $rowIndex = $row->getIndex();
        $row = $row->toArray();

        $pref_id = (int) Str::substr($row['都道府県コード又は市区町村コード'], 0, -3);

        $pref = Pref::find($pref_id);

        if (! $pref->exists) {
            return;
        }

        Home::updateOrCreate([
            'id' => $row['事業所番号'],
        ], [
            'pref_id' => $pref_id,
            'name' => $this->kana($row['事業所の名称']),
            'company' => $this->kana($row['法人の名称']),
            'tel' => $this->kana($row['事業所電話番号']),
            'address' => $this->kana($row['事業所住所（市区町村）'].$row['事業所住所（番地以降）']),
            'area' => $this->kana(Str::remove($pref->name, $row['事業所住所（市区町村）'])),
            'url' => $row['事業所URL'],
        ]);
    }
}
