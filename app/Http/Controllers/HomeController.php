<?php

namespace App\Http\Controllers;

use App\Actions\History;
use App\Models\Home;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Home::class, 'home');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): RedirectResponse
    {
        return to_route('index');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Home $home): View
    {
        app(History::class)->add($home);

        return view('homes.show')->with(compact('home'));
    }
}
