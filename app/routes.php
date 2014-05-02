<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


Route::resource('groups', 'GroupsController');

Route::resource('parameters', 'ParametersController');

Route::resource('actions', 'ActionsController');

Route::resource('steps', 'StepsController');

Route::resource('scenarios', 'ScenariosController');

Route::resource('features', 'FeaturesController');