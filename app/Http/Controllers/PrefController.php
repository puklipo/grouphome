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
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Pref $pref)
    {
        $homes = $pref->homes()->with('pref')
            ->latest('released_at')
            ->keywordSearch($request->query('q'))
            ->paginate()
            ->withQueryString()
            ->onEachSide(1);

        return view('home')->with(compact('homes'));
    }
}
