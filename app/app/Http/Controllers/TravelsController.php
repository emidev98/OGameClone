<?php

namespace App\Http\Controllers;

use App\Planet;
use App\Fleet;
use App\FleetLine;
use App\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TravelsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function selectPlanet(Planet $planet, Request $request){
        $quantity[0] = $request->shipsQuantity1;
        $quantity[1] = $request->shipsQuantity2;
        $quantity[2] = $request->shipsQuantity3;
        return view("travels.travels", ["planet" => $planet, "quantity" => $quantity, "maxSolarSystem" => Planet::getLastSolarSystem()]);
    }

}
