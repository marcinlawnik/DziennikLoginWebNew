<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddSnapshotsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('snapshots', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('hash', 32);
            $table->integer('user_id');
            $table->text('table_html');
            $table->boolean('is_processed')->nullable();
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
		Schema::drop('snapshots');
	}

}
