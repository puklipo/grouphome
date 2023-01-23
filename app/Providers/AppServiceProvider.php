<?php

namespace App\Providers;

use App\Doctrine\Geometry;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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
        // laravel-eloquent-spatialにはGeometryだけ足りないので追加
        if (DB::connection()->isDoctrineAvailable()) {
            DB::registerDoctrineType(Geometry::class, Geometry::GEOMETRY, Geometry::GEOMETRY);
            DB::connection()->registerDoctrineType(Geometry::class, Geometry::GEOMETRY, Geometry::GEOMETRY);
        }

        Model::preventLazyLoading(! $this->app->isProduction());
    }
}
