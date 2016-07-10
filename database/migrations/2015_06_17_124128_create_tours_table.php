<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToursTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tours', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('title', 150);
            $table->text('description');
            $table->text('short_description');
            $table->string('location', 100);
            $table->string('city', 50)->nullable();
            $table->string('country', 50);
            $table->date('tour_date')->nullable();
            $table->date('date_from')->nullable();
            $table->date('date_to')->nullable();
            $table->decimal('price_per_adult')->nullable();
            $table->decimal('price_per_child')->nullable();
            $table->integer('main_price')->nullable();
            $table->string('google_map')->nullable();
            $table->float('discount')->nullable();
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
		Schema::drop('tours');
	}

}
