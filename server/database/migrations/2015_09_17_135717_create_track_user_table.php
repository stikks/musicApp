<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackUserTable extends Migration {

	/**
	 * Run the migrations.
     *
	 * @return void
	 */
	public function up()
	{
		Schema::create('track_user_info', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('track_id')->unsigned();
			$table->integer('user_info_id')->unsigned();
			$table->timestamps();

			$table->unique(['track_id', 'user_info_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('track_user_info');
	}

}
