<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MinMaxMonitorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minMaxMonitor', function (Blueprint $table) {
            $table->increments('id');
            $table->float('minHumidityPercentage', 5,2);
            $table->float('maxHumidityPercentage', 5,2);
            $table->float('minCelsius', 5,2);
            $table->float('maxCelsius', 5,2);
            $table->float('minSoilMoisture', 6,2);
            $table->float('maxSoilMoisture', 6,2);
            $table->float('minLux', 7,2);
            $table->float('maxLux', 7,2);
            $table->integer('sensor_id')->unsigned();
            $table->timestamps();
            $table->foreign('sensor_id')
                ->references('id')
                ->on('sensor')
                ->onDelete('cascade');//
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('minMaxMonitor');////
    }
}
