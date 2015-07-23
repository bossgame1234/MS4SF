<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHumidityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airHumidity', function (Blueprint $table) {
        $table->increments('id');
        $table->float('humidityPercentage', 5);
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
        Schema::drop('airHumidity');////
    }
}
