<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHotelRoomTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hotel_room', function(Blueprint $table)
		{
            $table->increments('id');
            $table->date('date_from');
            $table->date('date_to');
            $table->integer('hotel_id');
            $table->integer('hotel_room_group_id')->unsigned();
            $table->string('room_number');
            $table->decimal('price_per_room');
            $table->decimal('child_price');
            $table->text('other');
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
		Schema::drop('hotel_room');
	}

}
