<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationRequestTable extends Migration {

	public function up()
	{
		Schema::create('donation_request', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('patient_name');
			$table->string('patient_phone');
			$table->string('hospital_name');
			$table->string('hospital_address');
			$table->integer('patient_age');
			$table->integer('bags_num');
			$table->integer('city_id')->unsigned();
			$table->integer('blood_type_id')->unsigned();
			$table->integer('client_id')->unsigned();
			$table->text('details');
			$table->decimal('latitude', 10,8);
			$table->decimal('longitude', 10,8);
		});
	}

	public function down()
	{
		Schema::drop('donation_request');
	}
}
