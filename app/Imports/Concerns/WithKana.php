<?php

namespace App\Imports\Concerns;

use Illuminate\Support\Str;

trait WithKana
{
    protected function kana(?string $string = null): ?string
    {
        return Str::of($string)->kana('KVa')->trim()->value();
    }
}
