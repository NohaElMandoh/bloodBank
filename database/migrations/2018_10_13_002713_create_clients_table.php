<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 50);
			$table->string('email', 50);
			$table->date('birth_date');
			$table->integer('city_id');
			$table->string('phone', 25);
			$table->date('donation_last_date');
			$table->string('password', 100);
			$table->enum('blood_type', array(''));
			$table->string('api_token', 60);
			$table->char('status');
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}