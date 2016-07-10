<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cars', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->string('type', 50);
            $table->integer('hourly_price')->nullable();
            $table->integer('whole_day_price')->nullable();
            $table->string('company_name', 100)->nullable();
            $table->tinyInteger('passenger')->default(1);
            $table->tinyInteger('baggage')->default(1);
            $table->string('car_features', 10)->default('AVAILABLE');
            $table->tinyInteger('featured')->default('0');
            $table->string('pick_up_time', 20)->nullable();
            $table->string('drop_off_time', 20)->nullable();
            $table->string('pick_up_location', 100)->nullable();
            $table->string('drop_off_location', 100)->nullable();
            $table->tinyInteger('millage')->default('1');
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
		Schema::drop('cars');
	}

}
