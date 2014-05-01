<?php

class Action extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'text' => 'required',
		'haveWarning' => 'required'
	);
}
