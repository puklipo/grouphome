<?php

namespace App\Http\Controllers;

use App\Models\Pref;
use Illuminate\Http\Request;

class PrefAreaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Pref  $pref
     * @param  string  $area
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke(Request $request, Pref $pref, string $area)
    {
        $homes = $pref->homes()->with(['pref', 'type'])
            ->latest()
            ->where(fn ($query) => $query->where('area', $area))
            ->keywordSearch($request->query('q'))
            ->levelSearch($request->input('level'))
            ->typeSearch($request->input('type'))
            ->paginate()
            ->withQueryString()
            ->onEachSide(1);

        return view('pref.show')->with(compact('pref', 'homes'));
    }
}
