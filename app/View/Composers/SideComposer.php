<?php

namespace App\View\Composers;

use App\Models\Pref;
use Illuminate\View\View;

class SideComposer
{
    public function compose(View $view): void
    {
        $prefs = cache()->remember(
            'side.prefs',
            now()->addHour(),
            fn () => Pref::withCount('homes')->latest('homes_count')->get()
        );

        $view->with(compact('prefs'));
    }
}
