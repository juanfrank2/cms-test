<?php

class Group extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		'description' => 'required'
	);

    public function features()
    {
        return $this->belongsToMany('Feature', 'group_feature', 'id_group', 'id_feature');
    }

    public function scenarios()
    {
        return $this->belongsToMany('Scenario', 'group_scenario', 'id_group', 'id_scenario');
    }
}
