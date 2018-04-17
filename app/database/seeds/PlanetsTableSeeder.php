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
         'created_at' => NOW(),
         'updated_at' => NOW(),
      ]);
      DB::table('planets')->insert([
         'solar_system' => '1',
         'position' => '2',
         'created_at' => NOW(),
         'updated_at' => NOW(),
      ]);
      DB::table('planets')->insert([
         'solar_system' => '1',
         'position' => '3',
         'created_at' => NOW(),
         'updated_at' => NOW(),
      ]);
      DB::table('planets')->insert([
         'solar_system' => '1',
         'position' => '4',
         'created_at' => NOW(),
         'updated_at' => NOW(),
      ]);
      DB::table('planets')->insert([
         'solar_system' => '1',
         'position' => '5',
         'created_at' => NOW(),
         'updated_at' => NOW(),
      ]);
      DB::table('planets')->insert([
         'solar_system' => '1',
         'position' => '6',
         'created_at' => NOW(),
         'updated_at' => NOW(),
      ]);
      DB::table('planets')->insert([
         'solar_system' => '1',
         'position' => '7',
         'created_at' => NOW(),
         'updated_at' => NOW(),
      ]);
      DB::table('planets')->insert([
         'solar_system' => '1',
         'position' => '8',
         'created_at' => NOW(),
         'updated_at' => NOW(),
      ]);
      DB::table('planets')->insert([
         'solar_system' => '1',
         'position' => '9',
         'created_at' => NOW(),
         'updated_at' => NOW(),
      ]);
      DB::table('planets')->insert([
         'solar_system' => '1',
         'position' => '10',
         'created_at' => NOW(),
         'updated_at' => NOW(),
      ]);
      DB::table('planets')->insert([
         'solar_system' => '1',
         'position' => '11',
         'created_at' => NOW(),
         'updated_at' => NOW(),
      ]);
      DB::table('planets')->insert([
         'solar_system' => '1',
         'position' => '12',
         'created_at' => NOW(),
         'updated_at' => NOW(),
      ]);
      DB::table('planets')->insert([
         'solar_system' => '1',
         'position' => '13',
         'created_at' => NOW(),
         'updated_at' => NOW(),
      ]);
      DB::table('planets')->insert([
         'solar_system' => '1',
         'position' => '14',
         'created_at' => NOW(),
         'updated_at' => NOW(),
      ]);
      DB::table('planets')->insert([
         'solar_system' => '1',
         'position' => '15',
         'created_at' => NOW(),
         'updated_at' => NOW(),
      ]);

      DB::table('planets')->insert([
         'solar_system' => '2',
         'position' => '1',
         'created_at' => NOW(),
         'updated_at' => NOW(),
      ]);
      DB::table('planets')->insert([
         'solar_system' => '2',
         'position' => '2',
         'created_at' => NOW(),
         'updated_at' => NOW(),
      ]);
      DB::table('planets')->insert([
         'solar_system' => '2',
         'position' => '3',
         'created_at' => NOW(),
         'updated_at' => NOW(),
      ]);
      DB::table('planets')->insert([
         'solar_system' => '2',
         'position' => '4',
         'created_at' => NOW(),
         'updated_at' => NOW(),
      ]);
      DB::table('planets')->insert([
         'solar_system' => '2',
         'position' => '5',
         'created_at' => NOW(),
         'updated_at' => NOW(),
      ]);
      DB::table('planets')->insert([
         'solar_system' => '2',
         'position' => '6',
         'created_at' => NOW(),
         'updated_at' => NOW(),
      ]);
      DB::table('planets')->insert([
         'solar_system' => '2',
         'position' => '7',
         'created_at' => NOW(),
         'updated_at' => NOW(),
      ]);
      DB::table('planets')->insert([
         'solar_system' => '2',
         'position' => '8',
         'created_at' => NOW(),
         'updated_at' => NOW(),
      ]);
      DB::table('planets')->insert([
         'solar_system' => '2',
         'position' => '9',
         'created_at' => NOW(),
         'updated_at' => NOW(),
      ]);
      DB::table('planets')->insert([
         'solar_system' => '2',
         'position' => '10',
         'created_at' => NOW(),
         'updated_at' => NOW(),
      ]);
      DB::table('planets')->insert([
         'solar_system' => '2',
         'position' => '11',
         'created_at' => NOW(),
         'updated_at' => NOW(),
      ]);
      DB::table('planets')->insert([
         'solar_system' => '2',
         'position' => '12',
         'created_at' => NOW(),
         'updated_at' => NOW(),
      ]);
      DB::table('planets')->insert([
         'solar_system' => '2',
         'position' => '13',
         'created_at' => NOW(),
         'updated_at' => NOW(),
      ]);
      DB::table('planets')->insert([
         'solar_system' => '2',
         'position' => '14',
         'created_at' => NOW(),
         'updated_at' => NOW(),
      ]);
      DB::table('planets')->insert([
         'solar_system' => '2',
         'position' => '15',
         'created_at' => NOW(),
         'updated_at' => NOW(),
      ]);
    }
}
