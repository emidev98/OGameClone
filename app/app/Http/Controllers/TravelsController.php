<?php

namespace App\Http\Controllers;

use App\Planet;
use App\Travel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TravelsController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
      return view('travels.travels',  ["planets" => Planet::all(), "maxSolarSystem" => Planet::getLastSolarSystem()]);
  }

  public function createTravel(Planet $planet){
     $travel = new Travel;
     $travel->origin_planet_id = Auth::user()->planets[0]->id;
     $travel->destination_planet_id = $planet->id;
     $travel->start_date = NOW();
     $travel->end_date = NOW();
     $travel->travel_type = 'attack';
     $travel->fleet_id = null;
     $travel->save();
     return view('home');
  }
}
