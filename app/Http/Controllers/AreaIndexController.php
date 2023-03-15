<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Pref;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AreaIndexController extends Controller
{
    public function __invoke(Request $request): View
    {
        $prefs = Pref::oldest('id')->get();

        $areas = Home::with('pref')
                     ->select(['pref_id', 'area'])
                     ->selectRaw('count(area) as area_count')
                     ->whereNotNull('area')
                     ->groupBy('pref_id', 'area')
                     ->oldest('pref_id')
                     ->get()
                     ->groupBy('pref.id');

        return view('area.index')->with(compact('prefs', 'areas'));
    }
}
