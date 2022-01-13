<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $homes = $request->user()->homes()->oldest('name')->get();

        return view('dashboard')->with(compact('homes'));
    }
}
