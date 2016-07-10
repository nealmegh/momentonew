<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BookingAndUserTableChange extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('hotel_booking', function(Blueprint $table)
		{
            /** Drop This Column */
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('email');
            $table->dropColumn('country_code');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('city');
            $table->dropColumn('zip');
            $table->dropColumn('country');
            $table->dropColumn('tax');
            $table->dropColumn('total_price');
            $table->dropColumn('currency_code');
            $table->dropColumn('exchange_rate');
            $table->dropColumn('deposit_price');
            $table->dropColumn('user_id');

        });


        Schema::table('booking', function(Blueprint $table)
        {
            /** Add Column */
            $table->bigInteger('user_id')->after('id');
            $table->bigInteger('guest_id')->after('user_id');
            $table->decimal('tax')->default('0.00')->after('booking_no');
            $table->decimal('total_price')->defult('0.00')->after('tax');
            $table->string('currency_code')->default('')->after('total_price');
            $table->decimal('exchange_rate')->default('1.00000000')->after('currency_code');
            $table->decimal('deposit_price')->default('0.00')->after('exchange_rate');
            $table->integer('payment_method')->after('deposit_price');

        });

        Schema::table('users', function(Blueprint $table)
        {
            /** Add Column  */
            $table->string('country_code')->nullable()->after('last_name');

        });

        Schema::table('hotel_room', function(Blueprint $table)
        {
            /** Change Room Number Tyoe */
            $table->string('room_number', 20)->nullable()->change();
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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('country_code')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->string('country')->nullable();
            $table->decimal('tax')->default('0.00');
            $table->decimal('total_price')->defult('0.00');
            $table->string('currency_code')->default('');
            $table->decimal('exchange_rate')->default('1.00000000');
            $table->decimal('deposit_price')->default('0.00');
            $table->bigInteger('user_id')->nullable();

        });

        Schema::table('booking', function(Blueprint $table)
        {
            /** Add Column */
            $table->dropColumn('user_id');
            $table->dropColumn('guest_id');
            $table->dropColumn('tax')->default('0.00');
            $table->dropColumn('total_price')->defult('0.00');
            $table->dropColumn('currency_code')->default('');
            $table->dropColumn('exchange_rate')->default('1.00000000');
            $table->dropColumn('deposit_price')->default('0.00');
            $table->dropColumn('payment_method');
        });

        Schema::table('users', function(Blueprint $table)
        {
            /** Add Column  */
            $table->dropColumn('country_code')->nullable();
        });
	}



}
