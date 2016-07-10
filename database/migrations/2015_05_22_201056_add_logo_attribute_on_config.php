<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLogoAttributeOnConfig extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('global_configs', function(Blueprint $table)
		{
			$table->string('logo');
            $table->string('favicon');
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
			$table->dropColumn('logo');
            $table->dropColumn('favicon');
		});
	}

}
