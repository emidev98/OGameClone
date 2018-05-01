<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FleetLine extends Model
{
    public function fleet() {
      return $this->belongsTo('App\Fleet');
    }

    public function shipType() {
      return $this->belongsTo('App\ShipType');
    }

    public static function createFleetLine($shipTypeId, $fleetId, $quantity){
      $fleetLine = new FleetLine();
      $fleetLine->ship_type_id = $shipTypeId;
      $fleetLine->fleet_id = $fleetId;
      $fleetLine->quantity = $quantity;
      $fleetLine->save();
    }
}
