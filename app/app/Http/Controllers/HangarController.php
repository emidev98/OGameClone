<?php

namespace App\Http\Controllers;

use App\Planet;
use App\ShipType;
use App\Fleet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HangarController extends Controller
{

  public function __construct()
  {

  }

  public function index(Planet $planet)
  {
      return view('hangar.hangar', ["planet" => $planet, "shipTypes" => ShipType::all()]);
  }

  public function createHangar(Planet $planet)
  {
      $planet->has_hangar = true;
      $planet->save();
      return redirect()->route('hangar', $planet);
  }

  public function createShip(Planet $planet, ShipType $shipType, Request $request)
  {
      $planet->fleet->createOrModifyFleetLine($shipType, $request);
      return redirect()->route('hangar', $planet);
  }
}
