<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserAttribute extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->string('first_name')->after('password');
			$table->string('last_name')->after('first_name');
			$table->string('phone_no')->after('last_name');
			$table->string('birth_date')->after('phone_no');
			$table->string('address')->after('birth_date');
			$table->string('city')->after('address');
			$table->string('zip')->after('city');
			$table->string('country')->after('zip');
			$table->string('about')->after('country');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->dropColumn('first_name');
			$table->dropColumn('last_name');
			$table->dropColumn('phone_no');
			$table->dropColumn('birth_date');
			$table->dropColumn('address');
			$table->dropColumn('city');
			$table->dropColumn('zip');
			$table->dropColumn('country');
			$table->dropColumn('about');
		});
	}

}
