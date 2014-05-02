<?php

class Scenario extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		'description' => 'required'
	);

    public function grupos()
    {
        return $this->belongsToMany('Group', 'group_scenario', 'id_group', 'id_scenario');
    }

    public function verbos()
    {
        return $this->belongsToMany('Step', 'scenario_step', 'id_scenario', 'id_step', 'order'); //revisar order
    }
}
