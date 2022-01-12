<?php

namespace App\Http\Controllers;

use App\Actions\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function __invoke(Request $request)
    {
        $homes = app(History::class)->get();

        return view('history')->with(compact('homes'));
    }
}
