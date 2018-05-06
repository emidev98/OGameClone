<?php

namespace App\Http\Controllers;

use App\Planet;
use App\Fleet;
use App\FleetLine;
use App\Travel;
use App\Notification;
use Illuminate\Support\Facades\DB;
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

    private function createFleet(){
        $fleet = new Fleet();
        $fleet->user()->associate(Auth::user());
        $fleet->save();
        return $fleet;
    }

    private function createFleetLines($quantity, $fleet, $planet){
        $shipTypeId;
        $planetFleetLine;
        for ($i = 0; $i < 3; $i++) {
            if ($quantity[$i] > 0){
                $shipTypeId = $i + 1;
                $fleetLine = new FleetLine();
                $fleetLine->ship_type_id = $shipTypeId;
                $fleetLine->fleet()->associate($fleet);
                $fleetLine->quantity = $quantity[$i];
                $fleetLine->save();
                $planetFleetLine = FleetLine::where('ship_type_id', $shipTypeId)->where('fleet_id', $planet->fleet->id)->first();
                $planetFleetLine->quantity -= $quantity[$i];
                if ($planetFleetLine->quantity == 0){
                    $planetFleetLine->delete();
                } else
                    $planetFleetLine->save();
            }
        }
    }

    private function createTravel($fleet, $planet, $planetPos, $solarSystem){
        $travel = new Travel();
        $travel->originPlanet()->associate($planet);
        $destinationPlanet = Planet::where('position', $planetPos)->where('solar_system', $solarSystem)->first();
        $travel->destinationPlanet()->associate($destinationPlanet);
        $travel->start_date = DB::raw('now()');
        $travel->end_date = DB::raw('now()');
        $travelType = "";
        if (is_null($destinationPlanet->user)){
            $travelType = "colonize";
            $destinationPlanet->colonize($fleet);
        } elseif ($destinationPlanet->getNotNullUser()->id == $planet->user->id){
            $travelType = "transport";
            $destinationPlanet->fleet->sum($fleet);
        } else {
            $travelType = "attack";
            $notification = new Notification();
            $notification->desc = "Your planet: " . $destinationPlanet->name . " on Solar System: " . $solarSystem . " with Position: " . $planetPos . " has been attacked "
                . "by " . Auth::user()->name . ".";
            $notification->user()->associate($destinationPlanet->user);
            $notification->save();
        }
        $travel->type = $travelType;
        $travel->fleet()->associate($fleet);
        $travel->save();
        return $travel;
    }

    public function makeTravel(Planet $planet, Request $request){
        $quantity[0] = $request->shipsQuantity1;
        $quantity[1] = $request->shipsQuantity2;
        $quantity[2] = $request->shipsQuantity3;
        $solarSystem = $request->solarSystem;
        $planetPos = $request->planetPos;
        if (!($planet->position == $planetPos && $planet->solar_system == $solarSystem)){
            $fleet = $this->createFleet();
            $this->createFleetLines($quantity, $fleet, $planet);
            $travel = $this->createTravel($fleet, $planet, $planetPos, $solarSystem);
            $message = "Travel Summary:\nType: " . $travel->type . "\nPlanet:\n  Solar System: " . $solarSystem . "  Position: " . $planetPos;
        } else {
            $message = "You can't travel to the same planet!";
        }
        return view('travels.summary', ['planet' => $planet, 'message' => $message]);
    }

}
