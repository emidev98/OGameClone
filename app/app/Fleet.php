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

  public function travels() {
      return $this->hasMany('App\Travel');
  }

  public function createOrModifyFleetLine(ShipType $shipType, Request $request){
      $fleetLines = $this->fleetLines;
      $created = false;
      $quantity = $request->quantity;
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

  public function sum($fleet){
      $created;
      foreach ($fleet->fleetLines as $fleetLine) {
          $created = false;
          foreach ($this->fleetLines as $thisFleetLines) {
              if ($thisFleetLines->ship_type_id == $fleetLines->ship_type_id){
                  $thisFleetLines->quantity += $fleetLines->quantity;
                  $thisFleetLines->save();
                  $created = true;
              }
          }
          if (!$created){
              $newFleetLine = new FleetLine();
              $newFleetLine->shipType()->associate($fleetLine->shipType);
              $newFleetLine->fleet()->associate($this);
              $newFleetLine->quantity = $fleetLine->quantity;
          }
      }
  }
}
