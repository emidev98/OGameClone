<?php

namespace App\Http\Controllers;

use App\Planet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            return view('home', ["userPlanets" => Auth::user()->planets]);

        }
        return view('guest');
    }

    public function handleHomeView(Planet $planet){
        if (Auth::check())
          return view('home.home-view',  ["planet" => $planet]);;

        return redirect()->route("login");
    }
}
