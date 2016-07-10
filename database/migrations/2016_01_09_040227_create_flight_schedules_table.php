<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightSchedulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('flight_schedules', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('flight_id');
            $table->string('flight_no', 50)->nullable();
            $table->dateTime('take_of');
            $table->dateTime('landing');
            $table->string('duration')->nullable();
            $table->string('layover')->nullable();
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
		Schema::drop('flight_schedules');
	}

}
