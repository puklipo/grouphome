<?php

namespace App\Providers;

use App\View\Composers\SearchComposer;
use App\View\Composers\SideComposer;
use Illuminate\Pagination\PaginationState;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('side', SideComposer::class);
        View::composer('search.*', SearchComposer::class);
    }
}
