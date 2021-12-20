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

    public function chunkSize(): int
    {
        return 1000;
    }

    /**
     * @return int
     */
    protected function prefId(): int
    {
        $key = (string) Str::of(class_basename(static::class))->remove('Import')->lower();

        return Pref::where('key', $key)->value('id');
    }
}
