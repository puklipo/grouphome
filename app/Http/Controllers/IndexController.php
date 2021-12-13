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
        $homes = Home::latest('released_at')->cursorPaginate();

        return view('home')->with(compact('homes'));
    }
}
