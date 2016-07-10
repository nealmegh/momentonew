<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('review_title', 100);
            $table->text('review_text');
            $table->string('sort-trip', 20);
            $table->tinyInteger('cleanliness');
            $table->tinyInteger('comfort');
            $table->tinyInteger('location');
            $table->tinyInteger('facilities');
            $table->tinyInteger('staff');
            $table->tinyInteger('value_of_money');
            $table->string('user_id');
            $table->integer('commentable_id');
            $table->string('commentable_type');
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
		Schema::drop('comments');
	}

}
