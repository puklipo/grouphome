<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(Request $request): View
    {
        $homes = $request->user()->homes()->oldest('name')->get();

        return view('dashboard')->with(compact('homes'));
    }
}
