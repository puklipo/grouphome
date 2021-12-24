<?php

namespace App\Imports\Concerns;

use Illuminate\Support\Str;

trait WithKana
{
    /**
     * @param  string|null  $string
     * @return mixed
     */
    protected function kana(?string $string = null)
    {
        return Str::of($string)->kana('a')->trim()->__toString();
    }
}
