<?php

class Parameter extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		'pattern' => 'required',
		'order' => 'required'
	);

    public function cases()
    {
        return $this->belongsToMany('Case', 'case_parameter', 'id_case', 'id_parameter', 'value');
    }

}
