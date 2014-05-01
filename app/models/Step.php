<?php

class Step extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'type' => 'required',
		'warning' => 'required'
	);
}
