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
        //$rowIndex = $row->getIndex();
        $row = $row->toArray();

        //都道府県コード(1-47)+3桁の市区町村コードの形式。後ろ3文字を削除して都道府県コードを得る。
        $pref_id = (int) Str::substr($row['都道府県コード又は市区町村コード'], 0, -3);

        $pref = Pref::find($pref_id);

        if (! $pref->exists) {
            return;
        }

        //事業所番号が重複してることがそれなりに多い。最後にインポートしたデータが残る。更新時は一旦別のデータに変更された後最後のデータに戻るのでupdated_atだけが更新されたように見える。
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
