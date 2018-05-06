<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Planet extends Model
{

    protected $fillable = [
      'solar_system', 'position',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function fleet() {
      return $this->hasOne('App\Fleet');
    }

    public function travelDestinationPlanet() {
      return $this->hasMany('App\Travel','destination_planet');
    }

    public function travelOriginPlanet() {
      return $this->hasMany('App\Travel','origin_planet');
    }

    public function getNotNullUser(){
      $user = $this->user;
      if ($user == null)
        $user = new User();
      return $user;
    }

    public function colonize($fleet){
        $this->user()->associate(Auth::user());
        $newFleet = new Fleet();
        $newFleet->user()->associate(Auth::user());
        $newFleet->planet()->associate($this);
        $newFleet->save();
        foreach ($fleet->fleetLines as $fleetLine) {
            $newFleetLine = new FleetLine();
            $newFleetLine->shipType()->associate($fleetLine->shipType);
            $newFleetLine->fleet()->associate($newFleet);
            $newFleetLine->quantity = $fleetLine->quantity;
            $newFleetLine->save();
        }
        $this->save();
    }

    public static function createNewSolarSystem(int $newSolarSystem){
      for($i = 1; $i<=15; $i++){
        Planet::create([
            'position' => $i,
            'solar_system' => $newSolarSystem,
        ]);
      }
    }

    public static function getLastSolarSystem(){
      return DB::table('planets')->orderBy('solar_system', 'desc')->limit(1)->value('solar_system');
    }

    public static function getFreePlanet(){
      $freePlanets = Planet::doesntHave('user')->get();
      $freePlanetsLength = count($freePlanets);
      if($freePlanetsLength == 0){
        Planet::createNewSolarSystem(Planet::getLastSolarSystem()+1);
        $freePlanets = Planet::doesntHave('user')->get();
        $freePlanetsLength = count($freePlanets);
      }
      $planetChoosed = $freePlanets[rand(0, $freePlanetsLength-1)];
      return $planetChoosed;
    }
}
