<?php

namespace App\Http\Controllers;

use App\Models\Pref;
use Illuminate\Http\Request;

class PrefController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke(Request $request, Pref $pref)
    {
        $homes = $pref->homes()->with(['pref', 'type'])
            ->keywordSearch($request->input('q'))
            ->sortBy($request->input('sort'))
            ->levelSearch($request->input('level'))
            ->typeSearch($request->input('type'))
            ->paginate()
            ->withQueryString()
            ->onEachSide(1);

        return view('pref.show')->with(compact('pref', 'homes'));
    }
}
