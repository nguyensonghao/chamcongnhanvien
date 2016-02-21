<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDbTimekeeps extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('db_timekeeps', function ($table) {
			$table->increments('id');
			$table->integer('userId');
			$table->integer('type');
			$table->string('status');
			$table->date('dateCurrent');
			$table->date('time');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
