<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFacilityIconAttributeOnFacilityTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('facility_type', function(Blueprint $table)
		{
			$table->string('icon')->after('name');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('facility_type', function(Blueprint $table)
		{
			$table->dropColumn('icon');
		});
	}

}
