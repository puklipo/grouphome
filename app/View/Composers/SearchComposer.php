<?php

namespace App\View\Composers;

use App\Models\Type;
use Illuminate\View\View;

class SearchComposer
{
    public function compose(View $view)
    {
        $types = cache()->remember('search.types', now()->addDay(), fn () => Type::all());

        $view->with(compact('types'));
    }
}
