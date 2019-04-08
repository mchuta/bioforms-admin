<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //abort(403, auth()->user());

        
        $forms = [];

        if (auth()->user()->forms) {
            $forms = auth()->user()->forms;
        }
        return view('home', ['forms' => $forms]);
    }

}
