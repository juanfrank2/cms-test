<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupScenarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('group_scenario', function(Blueprint $table) {
            $table->integer('id_group')->unsigned()->index();
            $table->integer('id_scenario')->unsigned()->index();
            $table->foreign('id_group')->references('id')->on('group');
            $table->foreign('id_scenario')->references('id')->on('scenario');
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
