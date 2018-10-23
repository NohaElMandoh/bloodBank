<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticlesTable extends Migration {

	public function up()
	{
		Schema::create('articles', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('client_id');
			$table->text('text');
			$table->string('img', 100);
			$table->date('publish_date');
			$table->integer('category_id');
			$table->string('title', 100);
		});
	}

	public function down()
	{
		Schema::drop('articles');
	}
}