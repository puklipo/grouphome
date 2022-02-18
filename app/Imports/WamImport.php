<?php

namespace App\Imports;

use App\Imports\Concerns\WithKana;
use App\Models\Pref;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Validators\Failure;

class WamImport implements OnEachRow, WithHeadingRow, WithBatchInserts, WithChunkReading, SkipsEmptyRows,
                           WithValidation, SkipsOnFailure
{
    use Importable;
    use WithKana;

    public function rules(): array
    {
        return [
            '事業所番号' => ['required', 'numeric', 'between:100000000,4800000000'],
            '事業所の名称' => 'required',
        ];
    }

    public function onRow(Row $row)
    {
        //都道府県コード(1-47)+3桁の市区町村コードの形式。後ろ3文字を削除して都道府県コードを得る。
        $pref_id = (int) Str::substr($row['都道府県コード又は市区町村コード'], 0, -3);

        $pref = Pref::find($pref_id);

        if (! $pref->exists) {
            return;
        }

        //事業所番号が重複してることがそれなりに多い。最後にインポートしたデータが残る。更新時は一旦別のデータに変更された後最後のデータに戻るのでupdated_atだけが更新されたように見える。
        $pref->homes()->updateOrCreate([
            'id' => $row['事業所番号'],
        ], [
            'name' => $this->kana($row['事業所の名称']),
            'company' => $this->kana($row['法人の名称']),
            'tel' => $this->kana($row['事業所電話番号']),
            'address' => $this->kana($row['事業所住所（市区町村）'].$row['事業所住所（番地以降）']),
            'area' => $this->kana(Str::remove($pref->name, $row['事業所住所（市区町村）'])),
            'url' => $row['事業所URL'],
        ]);
    }

    public function batchSize(): int
    {
        return 100;
    }

    public function chunkSize(): int
    {
        return 3000;
    }

    /**
     * @param  Failure[]  $failures
     */
    public function onFailure(Failure ...$failures)
    {
        //
    }
}
