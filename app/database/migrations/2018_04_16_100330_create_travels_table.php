<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travels', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('origin_planet_id')->unsigned();
          $table->integer('destination_planet_id')->unsigned();
          $table->dateTime('start_date');
          $table->dateTime('end_date');
          $table->enum('travel_type', ['attack', 'spy', 'transport', 'colonize', 'deploy']);
          $table->integer('fleet_id')->unsigned()->nullable();
          $table->foreign('fleet_id')->references('id')->on('fleets')->onDelete('set null');
          $table->foreign('origin_planet_id')->references('id')->on('planets');
          $table->foreign('destination_planet_id')->references('id')->on('planets');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('travels');
    }
}
