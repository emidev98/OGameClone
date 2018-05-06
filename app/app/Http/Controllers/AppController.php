<?php

namespace App\Http\Controllers;

use App\Planet;
use App\Notification;
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
            return view('home', ["userPlanets" => Auth::user()->planets, "notifies" => Auth::user()->notifications]);

        }
        return view('guest');
    }
    public function deleteNotify(Notification $notify){
        if(Auth::check()){
            $notify->delete();
            return redirect()->route('app');
        }
        return view('guest');
    }
}
