<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScenarioStepTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('scenario_step', function(Blueprint $table) {
            $table->integer('order')->unsigned();
            $table->integer('id_scenario')->unsigned()->index();
            $table->integer('id_step')->unsigned()->index();
            $table->foreign('id_scenario')->references('id')->on('scenario');
            $table->foreign('id_step')->references('id')->on('step');
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
