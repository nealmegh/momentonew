<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightBookingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('flight_bookings', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('booking_no', 50);
            $table->integer('flight_id')->unsigned();
            $table->integer('adults');
            $table->integer('kids');
            $table->date('date_from')->nullable();
            $table->date('date_to')->nullable();
            $table->integer('total_days')->unsigned();
            $table->decimal('total_price');
            $table->string('pin_code', 20)->nullable();
            $table->text('special_requirements')->nullable();
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
		Schema::drop('flight_bookings');
	}

}
