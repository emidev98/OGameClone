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
        $quantity[0] = $request->shipsQuantity1;
        $quantity[1] = $request->shipsQuantity2;
        $quantity[2] = $request->shipsQuantity3;
        return view("travels.travels", ["planet" => $planet, "quantity" => $quantity, "maxSolarSystem" => Planet::getLastSolarSystem()]);
    }

    public function createTravel(Planet $planet, Request $request){
        if (!($request->solarSystem == $planet->solar_system && $request->planetPos == $planet->position)){
            $quantity[0] = $request->shipsQuantity1;
            $quantity[1] = $request->shipsQuantity2;
            $quantity[2] = $request->shipsQuantity3;
            $fleet = new Fleet();
            $fleet->user_id = Auth::user()->id;
            $fleet->save();
            for ($i=0; $i < count($quantity); $i++) {
                if ($quantity[i]>0){
                    $fleetLine = new FleetLine();
                    $fleetLine->ship_type_id = i+1;
                    $fleetLine->fleet()->associate($fleet);
                    $fleetLine->quantity = $quantity[i];
                    $fleetLine->save();
                    $planet->fleet->fleetLines[i]->quantity -= $quantity[i];
                    $planet->fleet->fleetLines[i]->save();
                }
            }
            $travel = new Travel();
            $travel->travelOriginPlanet() = $planet->id;
            $destinationPlanet = Planet::findPlanetByPos($request->planetPos, $request->solarSystem);
            $travel->travelDestinationPlanet()->associate($destinationPlanet);
            $travel->start_date = DB::raw('now()');
            $travel->end_date = DB::raw('now()');
            $travelType = "";
            if ($destinationPlanet->user == null){
                $travelType = "colonize";
            } elseif ($destinationPlanet->user != null && $destinationPlanet->user != Auth::user()){
                $travelType = "attack";
            } elseif ($destinationPlanet->user == Auth::user()){
                $travelType = "transport";
            }
            $travel->type = $travelType;
            $travel->fleet()->associate($fleet);
        } else {
            
        }
    }

}
