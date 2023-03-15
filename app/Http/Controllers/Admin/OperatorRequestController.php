<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OperatorRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OperatorRequestController extends Controller
{
    public function index(Request $request): View
    {
        $requests = OperatorRequest::with(['user', 'home'])->latest()->paginate();

        return view('admin.operator-request')->with(compact('requests'));
    }

    public function update(Request $request, OperatorRequest $operatorRequest): RedirectResponse
    {
        $user = $operatorRequest->user;
        $home = $operatorRequest->home;

        if ($user->homes->doesntContain($home)) {
            $user->homes()->save($home);
        }

        $operatorRequest->delete();

        return back()->banner($home->name.'を承認しました。');
    }

    public function destroy(OperatorRequest $operatorRequest): RedirectResponse
    {
        $operatorRequest->delete();

        return back()->dangerBanner('却下しました。');
    }
}
