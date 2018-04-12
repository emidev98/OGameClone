<?php

use Illuminate\Database\Seeder;

class PlanetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $userId = DB::table('users')->where('name', 'admin')->value('id');
      DB::table('planets')->insert([
         'solar_system' => '1',
         'position' => '1',
         'user_id' => $userId,
      ]);
      DB::table('planets')->insert([
         'solar_system' => '1',
         'position' => '2',
      ]);
      DB::table('planets')->insert([
         'solar_system' => '1',
         'position' => '3',
      ]);
      DB::table('planets')->insert([
         'solar_system' => '1',
         'position' => '4',
      ]);
      DB::table('planets')->insert([
         'solar_system' => '1',
         'position' => '5',
      ]);
      DB::table('planets')->insert([
         'solar_system' => '1',
         'position' => '6',
      ]);
      DB::table('planets')->insert([
         'solar_system' => '1',
         'position' => '7',
      ]);
      DB::table('planets')->insert([
         'solar_system' => '1',
         'position' => '8',
      ]);
      DB::table('planets')->insert([
         'solar_system' => '1',
         'position' => '9',
      ]);
      DB::table('planets')->insert([
         'solar_system' => '1',
         'position' => '10',
      ]);
      DB::table('planets')->insert([
         'solar_system' => '1',
         'position' => '11',
      ]);
      DB::table('planets')->insert([
         'solar_system' => '1',
         'position' => '12',
      ]);
      DB::table('planets')->insert([
         'solar_system' => '1',
         'position' => '13',
      ]);
      DB::table('planets')->insert([
         'solar_system' => '1',
         'position' => '14',
      ]);
      DB::table('planets')->insert([
         'solar_system' => '1',
         'position' => '15',
      ]);

      DB::table('planets')->insert([
         'solar_system' => '2',
         'position' => '1',
      ]);
      DB::table('planets')->insert([
         'solar_system' => '2',
         'position' => '2',
      ]);
      DB::table('planets')->insert([
         'solar_system' => '2',
         'position' => '3',
      ]);
      DB::table('planets')->insert([
         'solar_system' => '2',
         'position' => '4',
      ]);
      DB::table('planets')->insert([
         'solar_system' => '2',
         'position' => '5',
      ]);
      DB::table('planets')->insert([
         'solar_system' => '2',
         'position' => '6',
      ]);
      DB::table('planets')->insert([
         'solar_system' => '2',
         'position' => '7',
      ]);
      DB::table('planets')->insert([
         'solar_system' => '2',
         'position' => '8',
      ]);
      DB::table('planets')->insert([
         'solar_system' => '2',
         'position' => '9',
      ]);
      DB::table('planets')->insert([
         'solar_system' => '2',
         'position' => '10',
      ]);
      DB::table('planets')->insert([
         'solar_system' => '2',
         'position' => '11',
      ]);
      DB::table('planets')->insert([
         'solar_system' => '2',
         'position' => '12',
      ]);
      DB::table('planets')->insert([
         'solar_system' => '2',
         'position' => '13',
      ]);
      DB::table('planets')->insert([
         'solar_system' => '2',
         'position' => '14',
      ]);
      DB::table('planets')->insert([
         'solar_system' => '2',
         'position' => '15',
      ]);
    }
}
