<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDbWorks extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('db_works', function ($table) {
			$table->increments('id');
			$table->string('name');
			$table->string('note');
			$table->integer('userId');
			$table->string('email');
			$table->string('remember_token');
			$table->integer('status');
			$table->integer('level');
			$table->string('noteRate');
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
