<?php

namespace App\Imports\Concerns;

use App\Models\Pref;
use Illuminate\Support\Str;

trait WithImport
{
    /**
     * @return string|array
     */
    public function uniqueBy()
    {
        return 'id';
    }

    /**
     * @return int
     */
    private function prefId(): int
    {
        $key = (string) Str::of(class_basename(__CLASS__))->remove('Import')->lower();

        return Pref::where('key', $key)->first()->id;
    }
}
