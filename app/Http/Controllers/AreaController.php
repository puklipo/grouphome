<?php

namespace App\Http\Controllers;

use App\Models\Pref;
use Illuminate\Http\Request;

class AreaController extends Controller
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
        $homes = $pref->homes()->with('pref')
            ->latest()
            ->where(fn ($query) => $query->where('address', 'like', "%$area%")
                ->orWhere('area', $area))
            ->paginate()
            ->withQueryString()
            ->onEachSide(1);

        return view('pref.show')->with(compact('pref', 'homes'));
    }
}
