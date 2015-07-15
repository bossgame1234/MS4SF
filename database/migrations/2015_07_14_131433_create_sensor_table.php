<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSensorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sensor', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name',20);
			$table->integer('sensingDevice_id')->unsigned();
			$table->timestamps();
			$table->foreign('sensingDevice_id')
				->references('id')
				->on('sensingDevice')
				->onDelete('cascade');
		});//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sensor');//
	}

}
