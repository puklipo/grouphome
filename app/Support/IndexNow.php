<?php

namespace App\Support;

use Illuminate\Support\Facades\Http;

class IndexNow
{
    public static function submit(string $url): int
    {
        if (! app()->isProduction()) {
            return 0;
        }

        return Http::get(config('indexnow.search_engine'), [
            'url' => $url,
            'key' => config('indexnow.key'),
        ])->status();
    }
}
