<?php

use App\Jobs\SitemapJob;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('sitemap', function () {
    SitemapJob::dispatch();
})->purpose('Create sitemap');

Artisan::command('csv:convert', function () {
    $csv = file_get_contents(resource_path('csv/wam_sjis.csv'));
    $csv = mb_convert_encoding($csv, 'UTF-8', 'SJIS');
    file_put_contents(resource_path('csv/wam_utf8.csv'), $csv);
})->purpose('元のCSVがShift-JISだった場合にUTF-8に変換');
