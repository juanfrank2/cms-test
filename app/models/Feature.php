<?php

class Feature extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		'description' => 'required'
	);

    public function groups()
    {
        return $this->belongsToMany('Group', 'group_feature', 'id_group', 'id_feature');
    }
}
