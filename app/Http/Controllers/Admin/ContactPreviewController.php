<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactPreviewController extends Controller
{
    public function __invoke(Request $request, Contact $contact)
    {
        return view('admin.preview')->with(compact('contact'));
    }
}
