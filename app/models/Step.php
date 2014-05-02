<?php

class Step extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'type' => 'required', //array
		'warning' => 'accepted'
	);

    public function scenarios()
    {
        return $this->belongsToMany('Scenario', 'scenario_step', 'id_scenario', 'id_step', 'order'); //revisar order
    }
}
