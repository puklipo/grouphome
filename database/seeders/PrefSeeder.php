<?php

namespace Database\Seeders;

use App\Models\Pref;
use Illuminate\Database\Seeder;

class PrefSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 都道府県のデータ
        collect(config('pref'))->each(function ($pref, $key) {
            Pref::updateOrCreate([
                'key' => $key,
            ], [
                'name' => $pref['name'],
            ]);
        });
    }
}
