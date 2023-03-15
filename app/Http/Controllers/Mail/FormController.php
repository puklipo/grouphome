<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FormController extends Controller
{
    public function __invoke(Request $request, Home $home): View
    {
        $mail = $request->input('mail');

        return view('homes.mail.form')->with(compact('home', 'mail'));
    }
}
