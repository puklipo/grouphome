<?php

namespace App\Jobs;

use App\Models\Home;
use App\Models\Pref;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
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
        $sitemap = Sitemap::create()
                          ->add(Url::create('/'))
                          ->add(Url::create(route('area.index')))
                          ->add(Url::create(route('detail-search')))
                          ->add(Url::create(route('matching')))
                          ->add(Url::create(route('help.user')))
                          ->add(Url::create(route('help.operator')))
                          ->add(Url::create(route('license')));

        Pref::oldest('id')->lazy()->each(function (Pref $pref) use ($sitemap) {
            $sitemap->add(
                Url::create(route('pref', $pref))
            );
        });

        Home::latest('updated_at')->lazy()->each(function (Home $home) use ($sitemap) {
            $sitemap->add(
                Url::create(route('home.show', $home))
                   ->setLastModificationDate($home->updated_at)
            );
        });

        $sitemap->writeToDisk('s3', 'sitemap.xml');
    }
}
