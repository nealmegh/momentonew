<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hotel', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('title');
            $table->string('address');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('zip');
            $table->string('email');
            $table->string('fax');
            $table->string('phone');
            $table->string('cell');
            $table->decimal('distance_from_airport');
            $table->decimal('distance_from_market');
            $table->boolean('pet_allowed');
            $table->text('google_map');
            $table->text('general_information');
            $table->text('service_information');
            $table->text('other_information');
            $table->text('policy');
            $table->text('terms');
            $table->text('privacy');
            $table->softDeletes();
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
		Schema::drop('hotel');
	}

}
