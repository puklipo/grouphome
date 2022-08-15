<?php

use App\Jobs\SitemapJob;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('sitemap', function () {
    SitemapJob::dispatch();
})->purpose('Create sitemap');

Artisan::command('csv:convert', function () {
    $csv = file_get_contents(resource_path('csv/wam_sjis.csv'));
    $csv = mb_convert_encoding($csv, 'UTF-8', 'Shift-JIS');
    file_put_contents(resource_path('csv/wam.csv'), $csv);
})->purpose('元のCSVがShift-JISだった場合にUTF-8に変換');
