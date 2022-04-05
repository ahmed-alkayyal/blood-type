<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConatactsTable extends Migration {

	public function up()
	{
		Schema::create('conatacts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('email');
			$table->string('phone');
			$table->string('subject');
			$table->text('message');
		});
	}

	public function down()
	{
		Schema::drop('conatacts');
	}
}
