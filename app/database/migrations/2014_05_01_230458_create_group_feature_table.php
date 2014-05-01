<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupFeatureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('group_feature', function(Blueprint $table) {
            $table->integer('id_group')->unsigned()->index();
            $table->integer('id_feature')->unsigned()->index();
            $table->foreign('id_group')->references('id')->on('group');
            $table->foreign('id_feature')->references('id')->on('feature');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
