<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Planet extends Model
{

    protected $fillable = [
      'solar_system', 'position',
    ];

    public function user() {
        return $this->belongsTo('App\User');
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
