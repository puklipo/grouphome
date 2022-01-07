<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $homes = collect(session('history', []))
            ->map(fn ($history) => Home::with(['pref', 'type'])->find($history));

        return view('history')->with(compact('homes'));
    }
}
