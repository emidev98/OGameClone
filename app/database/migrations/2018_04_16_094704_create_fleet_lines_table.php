<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFleetLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fleet_lines', function (Blueprint $table) {
          $table->increments('id')->unsigned();
          $table->integer('ship_type_id')->unsigned();
          $table->integer('fleet_id')->unsigned();
          $table->unique(array('ship_type_id', 'fleet_id'));
          $table->integer('quantity')->unsigned()->default(1);
          $table->foreign('fleet_id')->references('id')->on('fleets')->onDelete('cascade');
          $table->foreign('ship_type_id')->references('id')->on('ship_types');
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
        Schema::dropIfExists('fleet_lines');
    }
}
