<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHotelGradeColumnToHotelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('hotel', function(Blueprint $table)
        {
            $table->integer('grade_id', false, true)->after('category_id');
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
            $table->dropColumn('grade_id');
        });
	}

}
