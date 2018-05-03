<?php

namespace App\Http\Controllers;

use App\Planet;
use App\Travel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GalaxyController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
      return view('galaxy.galaxy',  ["planets" => Planet::all(), "maxSolarSystem" => Planet::getLastSolarSystem()]);
  }
}
