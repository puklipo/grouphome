<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OperatorRequest;
use Illuminate\Http\Request;

class OperatorRequestController extends Controller
{
    public function index(Request $request)
    {
        $requests = OperatorRequest::with(['user', 'home'])->latest()->paginate(2);

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

    public function destroy(OperatorRequest $operatorRequest)
    {
        $operatorRequest->delete();

        return back()->dangerBanner('却下しました。');
    }
}
