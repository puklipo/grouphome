<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Models\OperatorRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function __invoke(Request $request, Home $home): RedirectResponse
    {
        if ($request->user()->homes->contains($home)) {
            return back();
        }

        $ope = OperatorRequest::firstOrCreate([
            'user_id' => $request->user()->id,
            'home_id' => $home->id,
        ]);

        if ($ope->wasRecentlyCreated) {
            return back()->banner($home->name.'の事業者として申請しました。');
        }

        return back()->dangerBanner('すでに申請しています。');
    }
}
