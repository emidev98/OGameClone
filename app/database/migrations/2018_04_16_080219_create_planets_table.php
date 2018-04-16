<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planets', function (Blueprint $table) {
          $table->increments('id');
          //$table->string('name')->unique();
          $table->integer('position')->unsigned();
          $table->integer('solar_system')->unsigned();
          $table->integer('metal_mine_lvl')->unsigned()->default(0);
          $table->integer('metal_capacity')->unsigned()->default(10000);
          $table->integer('crystal_mine_lvl')->unsigned()->default(0);
          $table->integer('crystal_capacity')->unsigned()->default(10000);
          $table->integer('deuterium_mine_lvl')->unsigned()->default(0);
          $table->integer('deuterium_capacity')->unsigned()->default(10000);
          $table->integer('user_id')->unsigned()->nullable()->default(null);
          $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
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
        Schema::dropIfExists('planets');
    }
}
