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

$router->get('test', 'TestController@index');

$router->get('journal', 'JournalController@index');

$router->get('user/{id}', 'UserController@showProfile');

// Authentication Routes
$router->get('register', 'Auth\AuthController@getRegister');
$router->post('register', 'Auth\AuthController@postRegister');

$router->get('login', 'Auth\AuthController@getLogin');
$router->post('login', 'Auth\AuthController@postLogin');
$router->get('logout', 'Auth\AuthController@getLogout');

//$router->get('user/login',              'UserController@login');
//$router->post('user/{user}/login',      'UserController@loggingin');
//$router->resource('journal',            'JournalController');
//$router->resource('medicines',          'MedicinesController');
//$router->resource('triggers',           'TriggersController');