<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCommissionAttribute extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('agents_markups', function(Blueprint $table)
		{
			$table->integer('commission')->default('0')->after('markup');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('agents_markups', function(Blueprint $table)
		{
			$table->dropColumn('commission');
		});
	}

}
