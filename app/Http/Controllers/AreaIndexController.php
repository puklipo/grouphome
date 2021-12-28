<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class AreaIndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $areas = Home::with('pref')
                     ->select(['pref_id', 'area'])
                     ->whereNotNull('area')
                     ->distinct()
                     ->oldest('pref_id')
                     ->get()
                     ->groupBy('pref.name');

        return view('area.index')->with(compact('areas'));
    }
}
