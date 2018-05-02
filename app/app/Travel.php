<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    public function fleet() {
      return $this->belongsTo('App\Fleet');
    }

    public function originPlanet() {
      return $this->belongsTo('App\Planet');
    }

    public function destinationPlanet() {
      return $this->belongsTo('App\Planet');
    }
}
