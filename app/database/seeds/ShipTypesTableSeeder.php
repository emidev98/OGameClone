<?php

use Illuminate\Database\Seeder;

class ShipTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('ship_types')->insert([
          'name' => 'Cazador ligero',
          'attack_points' => 65,
          'armor' => 10,
          'capacity' => 50,
          'speed' => 0.5,
          'construct_time' => 0,
          'hp' => 6000,
          'created_at' => NOW(),
          'updated_at' => NOW(),
      ]);
      DB::table('ship_types')->insert([
          'name' => 'Cazador pesado',
          'attack_points' => 195,
          'armor' => 25,
          'capacity' => 100,
          'speed' => 0.8,
          'construct_time' => 0,
          'hp' => 15000,
          'created_at' => NOW(),
          'updated_at' => NOW(),
      ]);
      DB::table('ship_types')->insert([
          'name' => 'Crucero',
          'attack_points' => 410,
          'armor' => 40,
          'capacity' => 800,
          'speed' => 0.4,
          'construct_time' => 0,
          'hp' => 39000,
          'created_at' => NOW(),
          'updated_at' => NOW(),
      ]);
    }
}
