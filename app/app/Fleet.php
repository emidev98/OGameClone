<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fleet extends Model
{
  public function user() {
   return $this->belongsTo('App\User');
  }
  public function planet() {
    return $this->belongsTo('App\Planet');
  }
}
