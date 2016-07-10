<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourBookingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tour_bookings', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('booking_no', 50);
            $table->integer('tour_id')->unsigned();
            $table->integer('adults');
            $table->integer('kids');
            $table->tinyInteger('child_ages');
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
		Schema::drop('tour_bookings');
	}

}
