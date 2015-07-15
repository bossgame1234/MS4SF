<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plot', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name', 20);
			$table->text('description');
			$table->date('DOB');
			$table->integer('farm_id')->unsigned();
			$table->timestamps();
			$table->foreign('farm_id')
				->references('id')
				->on('farm')
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
		Schema::drop('plot');//
	}

}
