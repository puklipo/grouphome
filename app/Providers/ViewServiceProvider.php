<?php

namespace App\Providers;

use App\View\Composers\SearchComposer;
use App\View\Composers\SideComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        View::composer('side', SideComposer::class);
        View::composer('search.simple', SearchComposer::class);
    }
}
