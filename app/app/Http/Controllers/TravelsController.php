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
    public function selectPlanet(Planet $planet, Request $request){
        $fleet = new Fleet();
        $user = Auth::user();
        $fleet->user_id = $user->id;
        $fleet->save();
        if ($request->shipsQuantity1 > 0){
            $fleetLine = new FleetLine();
            $fleetLine->ship_type_id = 1;
            $fleetLine->fleet_id = $fleet->id;
            $fleetLine->quantity = $request->shipsQuantity1;
            $fleetLine->save();
            $planet->fleet->fleetLines[0]->quantity -= $request->shipsQuantity1;
            $planet->fleet->fleetLines[0]->save();
        }
        if ($request->shipsQuantity2 > 0){
            $fleetLine = new FleetLine();
            $fleetLine->ship_type_id = 2;
            $fleetLine->fleet_id = $fleet->id;
            $fleetLine->quantity = $request->shipsQuantity2;
            $fleetLine->save();
        }
        if ($request->shipsQuantity3 > 0){
            $fleetLine = new FleetLine();
            $fleetLine->ship_type_id = 3;
            $fleetLine->fleet_id = $fleet->id;
            $fleetLine->quantity = $request->shipsQuantity3;
            $fleetLine->save();
        }
        $travel = new Travel();
        $travel->origin_planet_id = $planet->id;
        $travel->fleet_id = $fleet->id;
        $travel->type = $request->travelType;
        return view("travels.travels", ["travel" => $travel, "selectPlanet" => true, "planet" => $planet, "planets" => Planet::all()]);
    }
}
