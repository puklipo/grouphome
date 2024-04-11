<?php

namespace App\Listeners;

use Illuminate\Pagination\Paginator;

class FlushPagination
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(mixed $event): void
    {
        Paginator::useTailwind();
    }
}
