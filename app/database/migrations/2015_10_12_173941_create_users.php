<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function ($table) {
			$table->increments('id');
			$table->string('username');
			$table->string('password');
			$table->string('fullname');
			$table->string('email');
			$table->string('remember_token');
			$table->integer('status');
			$table->integer('token');
			$table->integer('lock');
			$table->string('password2');
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
