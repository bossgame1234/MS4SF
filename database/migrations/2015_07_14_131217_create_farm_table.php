<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('farm', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name', 20);
			$table->float('latitude', 9,6);
			$table->float('longitude',9,6);
			$table->text('address');
			$table->text('description');
			$table->integer('user_id')->unsigned();
			$table->foreign('plot_id')
				->references('id')
				->on('users')
				->onDelete('cascade');
			$table->timestamps();
            $table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('farm');//
	}

}
