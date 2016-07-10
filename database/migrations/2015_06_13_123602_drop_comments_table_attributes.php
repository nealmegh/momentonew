<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropCommentsTableAttributes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('comments', function(Blueprint $table)
		{
            $table->dropColumn('sort-trip');
            $table->dropColumn('cleanliness');
            $table->dropColumn('comfort');
            $table->dropColumn('location');
            $table->dropColumn('facilities');
            $table->dropColumn('staff');
            $table->dropColumn('value_of_money');
            $table->tinyInteger('status')->default(1)->after('user_id');

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('comments', function(Blueprint $table)
		{
            $table->string('sort-trip', 20);
            $table->tinyInteger('cleanliness');
            $table->tinyInteger('comfort');
            $table->tinyInteger('location');
            $table->tinyInteger('facilities');
            $table->tinyInteger('staff');
            $table->tinyInteger('value_of_money');
            $table->dropColumn('status');
        });
	}

}
