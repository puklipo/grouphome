<?php

namespace App\Http\Controllers;

use App\Models\Pref;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PrefController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke(Request $request, Pref $pref, ?string $area = null): View
    {
        return view('pref.show')->with(compact('pref', 'area'));
    }
}
