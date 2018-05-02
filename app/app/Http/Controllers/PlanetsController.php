<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Planet;

class PlanetsController extends Controller
{
  public function __construct()
  {
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Planet $planet)
  {
    return view('planet.planet',  ["planet" => $planet]);
  }

  public function changeName(Planet $planet, Request $request){
      $planet->name = $request->planetName;
      $planet->save();
      return redirect()->route('planet', $planet);
  }
}
