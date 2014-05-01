<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeatureScenarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('feature_scenario', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('order')->unsigned();
            $table->integer('id_feature')->unsigned()->index();
            $table->integer('id_scenario')->unsigned()->index();
            $table->foreign('id_feature')->references('id')->on('feature');
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
