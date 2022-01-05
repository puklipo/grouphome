<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Home;
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

        return back();
    }
}
