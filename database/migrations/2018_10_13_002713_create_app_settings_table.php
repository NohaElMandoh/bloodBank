<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppSettingsTable extends Migration {

	public function up()
	{
		Schema::create('app_settings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('phone', 50);
			$table->string('email', 100);
			$table->text('about_text');
			$table->string('facebook_url', 100);
			$table->string('twitter_url', 100);
			$table->string('youtube_url', 50);
			$table->string('whatsapp_url', 50);
			$table->string('instagram_url', 50);
			$table->string('gmail_url', 50);
		});
	}

	public function down()
	{
		Schema::drop('app_settings');
	}
}