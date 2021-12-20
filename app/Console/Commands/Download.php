<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Client\Pool;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

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
            collect(config('pref'))->map(function ($pref, $key) use ($pool) {
                $this->info($key);
                if (empty($pref['sheets'])) {
                    return false;
                }

                return $pool->as($key)->get('https://docs.google.com/spreadsheets/d/'.$pref['sheets'].'/export?format=csv');
            })->toArray();
        });

        collect($responses)->each(function (Response $response, $key) {
            if ($response->ok()) {
                File::put(resource_path('csv/'.$key.'.csv'), $response->body());
            }
        });

        return 0;
    }
}
