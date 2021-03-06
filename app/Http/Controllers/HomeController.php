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
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function index()
    {
        if(auth()->user()->admin == true){
            return redirect(route('adminDashboard'));
        }elseif (auth()->user()->author == true){
            return redirect(route('authorDashboard'));
        }else{
            return redirect(route('userDashboard'));
        }
    }
}
