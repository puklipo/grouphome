<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function __invoke(Request $request, Home $home)
    {
        abort_if($request->missing('mail'), 403);

        abort_if($home->users()->doesntExist(), 403, $home->name.__('はグループホーム事業者が登録してないので問い合わせできません。'));

        $mail = $request->input('mail');

        return view('homes.mail.form')->with(compact('home', 'mail'));
    }
}
