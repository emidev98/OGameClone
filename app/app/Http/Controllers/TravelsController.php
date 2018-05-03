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

    public function makeTravel(Planet $planet, $oldRequest){
        $fleet = new Fleet();
        $user = Auth::user();
        $fleet->user_id = $user->id;
        $fleet->save();
        if ($oldRequest->shipsQuantity1 > 0){
            $fleetLine = new FleetLine();
            $fleetLine->ship_type_id = 1;
            $fleetLine->fleet_id = $fleet->id;
            $fleetLine->quantity = $oldRequest->shipsQuantity1;
            $fleetLine->save();
            $planet->fleet->fleetLines[0]->quantity -= $oldRequest->shipsQuantity1;
            $planet->fleet->fleetLines[0]->save();
        }
        if ($oldRequest->shipsQuantity2 > 0){
            $fleetLine = new FleetLine();
            $fleetLine->ship_type_id = 2;
            $fleetLine->fleet_id = $fleet->id;
            $fleetLine->quantity = $oldRequest->shipsQuantity2;
            $fleetLine->save();
        }
        if ($oldRequest->shipsQuantity3 > 0){
            $fleetLine = new FleetLine();
            $fleetLine->ship_type_id = 3;
            $fleetLine->fleet_id = $fleet->id;
            $fleetLine->quantity = $oldRequest->shipsQuantity3;
            $fleetLine->save();
        }
        $travel = new Travel();
        $travel->origin_planet_id = $planet->id;
        $travel->fleet_id = $fleet->id;
        $travel->type = $request->travelType;
        return redirect()->route('app');
    }
}
