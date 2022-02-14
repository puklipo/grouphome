<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function __invoke()
    {
        $contacts = Contact::latest()->paginate();

        return view('admin.contacts')->with(compact('contacts'));
    }
}
