<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDestinationColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('flights', function(Blueprint $table)
		{
			$table->string('from', 100)->after('short_description');
            $table->string('to', 100)->after('from');
            $table->string('duration')->default('1 Hour')->change();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('flights', function(Blueprint $table)
		{
			$table->dropColumn('from');
            $table->dropColumn('to');
		});
	}

}
