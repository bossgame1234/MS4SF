<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCropTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('crop', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name', 20);
			$table->text('type');
			$table->date('DOB');
			$table->date('harvestDay');
			$table->integer('plot_id')->unsigned();
			$table->timestamps();
			$table->foreign('plot_id')
				->references('id')
				->on('plot')
				->onDelete('cascade');
		});////
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('crop');//
	}

}
