<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;

class PrepareController extends Controller
{
    public function __invoke(Request $request, Home $home)
    {
        if ($home->users()->doesntExist()) {
            return to_route('home.show', $home)
                ->dangerBanner($home->name.__('はグループホーム事業者が登録してないので問い合わせできません。'));
        }

        return view('homes.mail.prepare')->with(compact('home'));
    }
}
