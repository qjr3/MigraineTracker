<?php //

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::model('user', 'App\User');

$router->get('test',                'TestController@index');

$router->get('user/create',         'UserController@create');
$router->post('user/create',        'UserController@store');
$router->get('user/login',          'UserController@login');
$router->post('user/login',         'UserController@login');
$router->get('user/',               'UserController@show');
$router->get('user/view',           'UserController@show');
$router->get('user/logout',         'UserController@logout');

$router->get('journal', 'JournalController@index');

//$router->get('user/login',              'UserController@login');
//$router->post('user/{user}/login',      'UserController@loggingin');
//$router->resource('journal',            'JournalController');
//$router->resource('medicines',          'MedicinesController');
//$router->resource('triggers',           'TriggersController');