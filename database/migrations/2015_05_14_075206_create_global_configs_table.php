<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGlobalConfigsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('global_configs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('site_title');
			$table->text('site_name')->nullable();
			$table->text('site_tag')->nullable();
			$table->text('admin_email');
			$table->text('phone_no');
			$table->text('facebook')->nullable();
			$table->text('twitter')->nullable();
			$table->text('googleplus')->nullable();
			$table->text('linkedin')->nullable();
			$table->text('dribble')->nullable();
			$table->text('vimeo')->nullable();
			$table->text('flicker')->nullable();
			$table->text('pinterest')->nullable();
			$table->text('about');


			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('global_configs');
	}

}
