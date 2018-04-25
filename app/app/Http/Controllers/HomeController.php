<?php

namespace App\Http\Controllers;

use App\Planet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('home', ['userPlanets' => Auth::user()->planets]);
    }

    public function handleView(Planet $planet){
      return view('home.home-view',  ["planet" => $planet]);;
    }
}
