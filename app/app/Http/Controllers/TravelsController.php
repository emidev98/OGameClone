<?php

namespace App\Http\Controllers;

use App\Planet;
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
}
