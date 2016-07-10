<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToHotel extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('hotel', function(Blueprint $table)
		{
			$table->tinyInteger('status')->default(1)->after('privacy');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('hotel', function(Blueprint $table)
		{
            $table->dropColumn('status');

        });
	}

}
