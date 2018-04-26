<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PlanetsTableSeeder::class);
        $this->call(ShipTypesTableSeeder::class);
        //$this->call(ResourcesTableSeeder::class);
    }
}
