<?php

namespace App\Console\Commands;

use App\Jobs\ImportJob;
use Illuminate\Console\Command;
use Illuminate\Support\Benchmark;

class ImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gh:import';

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
        $this->info('import start...');

        cache()->forget('side.prefs');

        $time = Benchmark::measure(fn () => ImportJob::dispatch());

        $this->info($time);

        $this->info('import end...');

        return 0;
    }
}
