<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeeklyHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weeklyHistory', function (Blueprint $table) {
            $table->increments('id');
            $table->float('avgTemperature', 6,2);
            $table->float('minTemperature', 6,2);
            $table->float('maxTemperature', 6,2);
            $table->float('avgAirHumidity', 6,2);
            $table->float('minAirHumidity', 6,2);
            $table->float('maxAirHumidity', 6,2);
            $table->float('avgLight', 6,2);
            $table->float('minLight', 6,2);
            $table->float('maxLight', 6,2);
            $table->float('avgSoilMoisture', 6,2);
            $table->float('minSoilMoisture', 6,2);
            $table->float('maxSoilMoisture', 6,2);
            $table->integer('sensor_id')->unsigned();
            $table->timestamps();
            $table->foreign('sensor_id')
                ->references('id')
                ->on('sensor')
                ->onDelete('cascade');//
        }); // // //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('weeklyHistory');////
    }
}
