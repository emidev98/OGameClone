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
}
