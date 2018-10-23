<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('donation_requests', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('client_id');
			$table->string('patient_name', 50);
			$table->integer('patient_age');
			$table->enum('blood_type', array(''));
			$table->integer('bags_num');
			$table->string('hospital_name', 50);
			$table->string('hospital_add', 100);
			$table->integer('city_id');
			$table->string('phone_num', 25);
			$table->string('notes', 100);
			$table->decimal('latitude', 10);
			$table->decimal('longitude', 10);
		});
	}

	public function down()
	{
		Schema::drop('donation_requests');
	}
}