<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Models\User;
use Illuminate\Http\Request;

class OperatorHomeController extends Controller
{
    public function index()
    {
        $users = User::with('homes')
            ->has('homes')
            ->latest()
            ->get();

        return view('admin.operator-home')->with(compact('users'));
    }

    public function destroy(User $user, Home $home)
    {
        $user->homes()->detach($home);

        return back()->banner($home->name.'を解除しました。');
    }
}
