<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    public function __invoke(Request $request)
    {
        $xml = cache()->remember('sitemap', now()->addDay(), function () {
            $sitemap = Sitemap::create()
                              ->add(Url::create('/'))
                              ->add(Url::create(route('area.index')));

            Home::latest()->lazy()->each(function (Home $home) use ($sitemap) {
                $sitemap->add(
                    Url::create(route('home.show', $home))
                       ->setLastModificationDate($home->updated_at)
                );
            });

            return $sitemap->render();
        });

        return response($xml, 200, [
            'Content-Type' => 'text/xml'
        ]);
    }
}
