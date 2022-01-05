<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Models\OperatorRequest;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Home  $home
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Home $home)
    {
        if ($request->user()->homes->doesntContain($home)) {
            OperatorRequest::firstOrCreate([
                'user_id' => $request->user()->id,
                'home_id' => $home->id,
            ]);
        }

        return back();
    }
}
