<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTaskList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TaskList', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->string('pictureLocation');
            $table->string('status');
            $table->float('maxHumidityPercentage', 5,2);
            $table->date('date');
            $table->time('time');
            $table->integer('plant_id');
            $table->integer('user_id');
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::drop('TaskList');//////
    }
}
