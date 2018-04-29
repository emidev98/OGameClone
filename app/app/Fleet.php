<?php

namespace App;

use App\ShipType;
use App\FleetLine;
use Illuminate\Database\Eloquent\Model;

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

  public function createOrModifyFleetLine(ShipType $shipType){
      $fleetLines = $this->fleetLines;
      $created = false;

      foreach ($fleetLines as $fleetLine) {
        if ($fleetLine->shipType == $shipType){
          $fleetLine->quantity++;
          $fleetLine->save();
          $created = true;
        }
      }
      if (!$created){
        FleetLine::createFleetLine($shipType->id, $this->id);
      }

  }
}
