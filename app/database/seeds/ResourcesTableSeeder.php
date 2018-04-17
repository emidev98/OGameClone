<?php

use Illuminate\Database\Seeder;

class ResourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('resources')->insert([
         'name' => 'Metal',
         'created_at' => NOW(),
         'updated_at' => NOW(),
      ]);
      DB::table('resources')->insert([
         'name' => 'Deuterium',
         'created_at' => NOW(),
         'updated_at' => NOW(),
      ]);
      DB::table('resources')->insert([
         'name' => 'Crystal',
         'created_at' => NOW(),
         'updated_at' => NOW(),
      ]);
    }
}
