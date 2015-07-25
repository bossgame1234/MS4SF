<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoilMoistureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soilMoisture', function (Blueprint $table) {
            $table->increments('id');
            $table->float('soilValue', 6,2);
            $table->string('soilState',10);
            $table->integer('sensor_id')->unsigned();
            $table->timestamps();
            $table->foreign('sensor_id')
                ->references('id')
                ->on('sensor')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('soilMoisture');// //
    }
}
