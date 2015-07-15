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
			$table->integer('device_id');
			$table->integer('plot_id')->unsigned();
			$table->timestamps();
			$table->foreign('plot_id')
				->references('id')
				->on('plot')
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
		Schema::drop('sensingDevice');//
	}

}
