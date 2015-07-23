<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSensingDeviceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sensingDevice', function (Blueprint $table) {
			$table->increments('id');
			$table->string('device_id',10);
			$table->integer('plot_id')->unsigned();
			$table->timestamps();
		});//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sensingDevice');//
	}

}
