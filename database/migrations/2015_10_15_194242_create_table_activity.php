<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableActivity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity', function(Blueprint $table)
        {
            $table->increments('id')->primary();
            $table->string('description', 255);
            $table->date('date');
            $table->time('time');
            $table->string('weather');
            $table->string('photo');
            $table->integer('plant_id')->unsigned();
            $table->timestamps();
            $table->foreign('plant_id')
                ->references('id')
                ->on('plant')
                ->onDelete('cascade');//
        }); //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('activity');////
    }
}
