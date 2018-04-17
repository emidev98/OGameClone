<?php

namespace App\Http\Controllers;

use App\Planet;
use App\Travel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TravelsController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
      return view('travels.travels',  ["planets" => Planet::all()]);
  }

  public function handleView(Planet $planet){
    return view('travels.show',  ["planet" => $planet]);;
  }

  public function createTravel(Planet $planet){
    /*DB::table('travels')->insert([
           'origin_planet_id' => Auth::user()->planets[0]->id,
           'destination_planet_id' => $planet->id,
           'start_date' => NOW(),
           'end_date' => NOW(),
           'travel_type' => 'attack',
           'fleet_id' => 1,
     ]);*/
     $travel = new Travel;
     $travel->origin_planet_id = Auth::user()->planets[0]->id;
     $travel->destination_planet_id = $planet->id;
     $travel->start_date = NOW();
     $travel->end_date = NOW();
     $travel->travel_type = 'attack';
     $travel->fleet_id = 1;
     $travel->save();
  }
}
