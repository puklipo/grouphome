<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function __invoke(Request $request, Home $home)
    {
        $mail = $request->input('mail');

        return view('homes.mail.form')->with(compact('home', 'mail'));
    }
}
