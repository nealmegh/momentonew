<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelRoomGroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('hotel_room_group', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('hotel_id');
            $table->text('room_type');
            $table->string('check_in_time');
            $table->string('check_out_time');
            $table->integer('adult_allowed');
            $table->integer('child_allowed');
            $table->integer('total_bed');
            $table->integer('extra_bed');
            $table->decimal('extra_bed_charge');
            $table->decimal('price');
            $table->string('description');
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
		Schema::drop('hotel_room_group');
	}

}
