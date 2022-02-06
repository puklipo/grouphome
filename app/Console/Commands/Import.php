<?php

namespace App\Console\Commands;

use App\Imports\WamImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class Import extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import from csv files';

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
        cache()->forget('side.prefs');

        HeadingRowFormatter::default('none');

        try {
            app(WamImport::class)->import(storage_path('wam.csv'));
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }

        return 0;
    }
}
