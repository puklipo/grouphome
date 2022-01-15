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
        $homes = Home::with(['pref', 'type', 'photo'])
                     ->select(['id', 'name', 'address', 'area', 'level', 'pref_id', 'type_id'])
                     ->keywordSearch($request->input('q'))
                     ->sortBy($request->input('sort'))
                     ->levelSearch($request->input('level'))
                     ->typeSearch($request->input('type'))
                     ->vacancySearch($request->input('vacancy'))
                     ->paginate()
                     ->withQueryString()
                     ->onEachSide(1);

        return view('home')->with(compact('homes'));
    }
}
