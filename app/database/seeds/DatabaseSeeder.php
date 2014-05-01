<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('GroupsTableSeeder');
		$this->call('ParametersTableSeeder');
		$this->call('ActionsTableSeeder');
		$this->call('StepsTableSeeder');
		$this->call('ScenariosTableSeeder');
		$this->call('FeaturesTableSeeder');
	}

}
