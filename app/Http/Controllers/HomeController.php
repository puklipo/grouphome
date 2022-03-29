<?php

namespace App\Http\Controllers;

use App\Actions\History;
use App\Models\Home;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Home::class, 'home');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        return to_route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Home $home)
    {
        app(History::class)->add($home);

        return view('homes.show')->with(compact('home'));
    }
}
