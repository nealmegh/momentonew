<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GlobalConfigsAttribute extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('global_configs', function(Blueprint $table)
		{
			$table->string('currency', 5)->default('৳')->after('phone_no');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('global_configs', function(Blueprint $table)
		{
			$table->dropColumn('currency');
		});
	}

}
