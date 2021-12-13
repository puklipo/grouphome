<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Database\Eloquent\Builder;
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
        $homes = Home::with('pref')->latest('released_at')
            ->when($request->query('q'), function (Builder $query, $search) {
                $query->where(function (Builder $query) use ($search) {
                    $query->where('name', 'like', "%$search%")
                        ->orWhere('address', 'like', "%$search%")
                        ->orWhere('company', 'like', "%$search%");
                });
            })->paginate()->withQueryString();

        return view('home')->with(compact('homes'));
    }
}
