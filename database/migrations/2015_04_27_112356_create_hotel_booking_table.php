<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelBookingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hotel_booking', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('country_code')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->string('country')->nullable();
            $table->text('special_requirements');
            $table->bigInteger('hotel_id')->nullable()->unsigned();
            $table->bigInteger('hotel_room_group_id')->nullable()->unsigned();
            $table->tinyInteger('rooms')->default('0')->unsigned();
            $table->tinyInteger('adults')->default('0')->unsigned();
            $table->tinyInteger('kids')->default('0')->unsigned();
            $table->integer('child_ages');
            $table->decimal('room_price')->default('0.00');
            $table->decimal('tax')->default('0.00');
            $table->decimal('total_price')->defult('0.00');
            $table->string('currency_code')->default('');
            $table->decimal('exchange_rate')->default('1.00000000');
            $table->decimal('deposit_price')->default('0.00');
            $table->date('date_from')->nullable();
            $table->date('date_to')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->integer('pin_code')->nullable();
            $table->integer('booking_no')->nullable();
            $table->tinyInteger('status')->default('1');
            $table->tinyInteger('mail_sent')->default('0');
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
		Schema::drop('hotel_booking');
	}

}
