<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaseParameterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('case_parameter', function(Blueprint $table) {
            $table->string('value');
            $table->integer('id_case')->unsigned()->index();
            $table->integer('id_parameter')->unsigned()->index();
            $table->foreign('id_case')->references('id')->on('case');
            $table->foreign('id_parameter')->references('id')->on('parameter');
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
