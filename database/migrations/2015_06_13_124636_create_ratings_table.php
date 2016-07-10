<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ratings', function(Blueprint $table)
		{
            $table->integer('comment_id')->unsigned();
            $table->integer('rating_type');
            $table->integer('rating_value')->default(0);
            $table->integer('rateable_id');
            $table->string('rateable_type', 50);
            $table->timestamps();

            $table->foreign('comment_id')
                ->references('id')->on('comments')
                ->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ratings');
	}

}
