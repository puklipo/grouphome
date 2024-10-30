<?php

namespace App\Imports;

use App\Imports\Concerns\WithKana;
use App\Models\Pref;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Row;
use MatanYadaev\EloquentSpatial\Objects\Point;

class WamImport implements OnEachRow, ShouldQueue, SkipsEmptyRows, SkipsOnFailure, WithChunkReading, WithHeadingRow, WithValidation
{
    use Importable;
    use SkipsFailures;
    use WithKana;

    public function rules(): array
    {
        return [
            '都道府県コード又は市区町村コード' => ['required', 'size:5'],
            '事業所番号' => ['required', 'numeric', 'between:100000000,4800000000', Rule::notIn(config('deleted'))],
            '事業所の名称' => 'required',
        ];
    }

    public function onRow(Row $row): void
    {
        //都道府県コード(01-47)+3桁の市区町村コードの形式。最初の2文字から都道府県コードを得る。
        $pref_id = (int) Str::take(string: $row['都道府県コード又は市区町村コード'], limit: 2);

        $pref = Pref::find($pref_id);

        if (empty($pref) || $pref->doesntExist()) {
            info('import', $row->toArray());
            return;
        }

        $id = (int) $row['事業所番号'];

        $data = [
            'name' => $this->kana($row['事業所の名称']),
            'name_kana' => $this->kana($row['事業所の名称_かな']),
            'company' => $this->kana($row['法人の名称']),
            'tel' => $this->kana($row['事業所電話番号']),
            'address' => $this->kana($row['事業所住所（市区町村）'].$row['事業所住所（番地以降）']),
            'area' => $this->kana(Str::remove($pref->name, $row['事業所住所（市区町村）'])),
            'url' => $row['事業所URL'],
        ];

        //SQLiteはGeometry非対応なのでテスト時は除く
        if (! app()->runningUnitTests()) {
            $point = new Point(
                latitude: (float) $row['事業所緯度'],
                longitude: (float) $row['事業所経度'],
                srid: (int) config('grouphome.geo.srid')
            );

            $data['location'] = $point;
        }

        //事業所番号が重複してることがそれなりに多い。最後にインポートしたデータが残る。更新時は一旦別のデータに変更された後最後のデータに戻るのでupdated_atだけが更新されたように見える。
        $pref->homes()->updateOrCreate([
            'id' => $id,
        ], $data);
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
