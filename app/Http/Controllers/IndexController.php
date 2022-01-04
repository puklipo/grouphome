<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $homes = Home::with(['pref', 'type'])
            ->latest()
            ->keywordSearch($request->input('q'))
            ->levelSearch($request->input('level'))
            ->typeSearch($request->input('type'))
            ->paginate()
            ->withQueryString()
            ->onEachSide(1);

        return view('home')->with(compact('homes'));
    }
}
