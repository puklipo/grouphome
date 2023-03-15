<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OperatorHomeController extends Controller
{
    public function index(): View
    {
        $users = User::with('homes')
                     ->latest()
                     ->paginate(1);

        return view('admin.operator-home')->with(compact('users'));
    }

    public function destroy(Request $request, User $user, Home $home): RedirectResponse
    {
        $request->validate([
            'confirm' => ['required', 'accepted'],
        ]);

        $user->homes()->detach($home);

        return back()->dangerBanner($home->name.'を解除しました。');
    }
}
