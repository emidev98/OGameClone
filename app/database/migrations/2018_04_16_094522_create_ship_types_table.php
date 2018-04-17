<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ship_types', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name')->unique();
          $table->integer('hp')->unsigned();
          $table->integer('armor')->unsigned();
          $table->integer('attack_points')->unsigned();
          $table->integer('speed')->unsigned();
          $table->integer('capacity')->unsigned();
          $table->integer('construct_time')->unsigned();
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
        Schema::dropIfExists('ship_types');
    }
}
