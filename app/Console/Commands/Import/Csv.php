<?php

namespace App\Console\Commands\Import;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class Csv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:csv';

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
        HeadingRowFormatter::default('none');

        collect(config('pref'))->keys()->each(function ($item) {
            $this->info($item);
            app('App\\Imports\\'.Str::studly($item).'Import')->import(resource_path("csv/$item.csv"));
        });

        return Command::SUCCESS;
    }
}
