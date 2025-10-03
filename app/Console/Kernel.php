<?php

namespace App\Console;

use App\Console\Commands\DeleteCommand;
use App\Console\Commands\ImportCommand;
use App\Jobs\SitemapJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        $schedule->job(SitemapJob::class)->monthlyOn(2);

        $schedule->command(ImportCommand::class)->monthly();
        $schedule->command(DeleteCommand::class)->dailyAt('02:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
