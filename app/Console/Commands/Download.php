<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Client\Pool;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class Download extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'download:csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $responses = Http::pool(function (Pool $pool) {
            collect(config('pref'))->map(fn (
                $pref,
                $key
            ) => empty($pref['sheets'])
                ? false
                : $pool->as($key)->get('https://docs.google.com/spreadsheets/d/'.$pref['sheets'].'/export?format=csv'))->toArray();
        });

        collect($responses)->each(function (Response $response, $key) {
            if ($response->ok()) {
                $this->info($key);

                Storage::put("csv/$key.csv", $response->body());
            }
        });

        return 0;
    }
}
