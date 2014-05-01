<?php

class Parameter extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		'pattern' => 'required',
		'order' => 'required'
	);
}
