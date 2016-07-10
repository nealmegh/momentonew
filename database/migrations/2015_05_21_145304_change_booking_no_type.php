<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeBookingNoType extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('hotel_booking', function(Blueprint $table)
		{
			$table->string('booking_no', 20)->change();
            $table->text('other')->nullable()->change();
		});

        Schema::table('booking', function(Blueprint $table)
        {
            $table->text('other')->nullable()->change();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('hotel_booking', function(Blueprint $table)
		{
		//	$table->integer('booking_no')->change();
		});
	}

}
