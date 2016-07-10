<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAddressAttribute extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('global_configs', function(Blueprint $table)
		{
            $table->string('address')->default("Bangladesh")->after('phone_no');
            $table->string('tax')->default("5")->after('phone_no');

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
			$table->dropColumn('address');
            $table->dropColumn('tax');
		});
	}

}
