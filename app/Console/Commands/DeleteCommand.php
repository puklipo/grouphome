<?php

namespace App\Console\Commands;

use App\Models\Home;
use Illuminate\Console\Command;

class DeleteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gh:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '閉鎖済み事業所を削除';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        foreach (config('deleted') as $id) {
            $home = Home::find($id);
            if ($home?->exists) {
                $home->delete();
            }
        }

        return 0;
    }
}
