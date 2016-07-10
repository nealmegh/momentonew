<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('flights', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
            $table->string('title');
            $table->string('company_name', 100)->nullable();
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->string('flight_type', 50);
            $table->string('fare_type', 50);
            $table->integer('duration')->nullable();
            $table->integer('cancellation')->nullable();
            $table->tinyInteger('flight_change')->default(1);
            $table->tinyInteger('baggage')->default(1);
            $table->string('flight_features', 10)->default('AVAILABLE');
            $table->tinyInteger('featured')->default('0');
            $table->integer('base_fare')->nullable();
            $table->tinyInteger('tax')->nullable();
            $table->string('direction', 50)->default('ONE WAY');
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
		Schema::drop('flights');
	}

}
