<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class ImportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        HeadingRowFormatter::default('none');

        collect(config('pref'))->keys()->each(function ($item) {
            info($item);
            try {
                app('App\\Imports\\'.Str::studly($item).'Import')
                    ->import("csv/$item.csv");
            } catch (\Exception $e) {
                logger()->error($e->getMessage());
            }
        });
    }
}
