<?php

namespace App;

use App\ShipType;
use App\FleetLine;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Fleet extends Model
{

  public function user() {
      return $this->belongsTo('App\User');
  }

  public function planet() {
      return $this->belongsTo('App\Planet');
  }

  public function fleetLines() {
      return $this->hasMany('App\FleetLine');
  }

  public function createOrModifyFleetLine(ShipType $shipType, Request $request){
      $fleetLines = $this->fleetLines;
      $created = false;
      $quantity = $request->quantity;
      if ($quantity == 0)
        $quantity = 1;
      foreach ($fleetLines as $fleetLine) {
        if ($fleetLine->shipType == $shipType){
          $fleetLine->quantity+=$quantity;
          $fleetLine->save();
          $created = true;
        }
      }
      if (!$created){
        FleetLine::createFleetLine($shipType->id, $this->id, $quantity);
      }

  }
}
