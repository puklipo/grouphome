<?php

namespace App\View\Composers;

use App\Models\Pref;
use App\Models\Type;
use Illuminate\View\View;

class SideComposer
{
    public function compose(View $view)
    {
        $types = cache()->remember(
            'side.types',
            now()->addHour(),
            fn () => Type::all()
        );

        $prefs = cache()->remember(
            'side.prefs',
            now()->addHour(),
            fn () => Pref::withCount('homes')->latest('homes_count')->get()
        );

        $view->with(compact('types', 'prefs'));
    }
}
