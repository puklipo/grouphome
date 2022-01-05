<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OperatorRequest;
use Illuminate\Http\Request;

class OperatorRequestController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $requests = OperatorRequest::with(['user', 'home'])->latest()->get();

        return view('admin.operator-request')->with(compact('requests'));
    }

    public function update(Request $request, OperatorRequest $operatorRequest)
    {
        $user = $operatorRequest->user;
        $home = $operatorRequest->home;

        if ($user->homes->doesntContain($home)) {
            $user->homes()->save($home);
        }

        $operatorRequest->delete();

        return back()->banner($home->name.'を承認しました。');
    }
}
