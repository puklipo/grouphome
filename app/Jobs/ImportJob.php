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
     * @param  string  $pref
     */
    public function __construct(public string $pref)
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

        try {
            app('App\\Imports\\'.Str::studly($this->pref).'Import')
                ->import("csv/$this->pref.csv");
        } catch (\Exception $e) {
            logger()->error($e->getMessage());
        }
    }
}
