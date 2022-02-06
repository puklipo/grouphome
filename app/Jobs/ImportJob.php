<?php

namespace App\Jobs;

use App\Imports\WamImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class ImportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 1;

    /**
     * Create a new job instance.
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

        try {
            app(WamImport::class)->import(base_path('storage/wam.csv'));
        } catch (\Exception $e) {
            logger()->error($e->getMessage());
        }
    }
}
