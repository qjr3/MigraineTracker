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

// Use RESTful methods so later they can be converted to $router->resources('user', 'UserController');
// $router->get('user/{id}, UserController@show');
$router->get('user/{id}', 'UserController@showProfile');

// Authentication Routes
// $router->get('register', 'Auth\AuthController@create');
$router->get('register', 'Auth\AuthController@getRegister');

// $router->post('register', 'Auth\AuthController@store');
$router->post('register', 'Auth\AuthController@postRegister');

// $router->get('login', 'Auth\AuthController@showLogin');
$router->get('login', 'Auth\AuthController@getLogin'); // get? what is a login? I don't know this object type.

// $router->post('login', 'Auth\AuthController@login');
$router->post('login', 'Auth\AuthController@postLogin');

/* 
// Doesn't require call to controller. Simplest method is typically the best method.
$router->get('logout', function() {
    Auth::logout();
    return redirect('/');
});

// or
// $router->get('logout', 'Auth\AuthController@logout'); // why call it get? you're not getting anything in terms of code.
*/
$router->get('logout', 'Auth\AuthController@getLogout');

//$router->get('user/login',              'UserController@login');
//$router->post('user/{user}/login',      'UserController@loggingin');
//$router->resource('journal',            'JournalController');
//$router->resource('medicines',          'MedicinesController');
//$router->resource('triggers',           'TriggersController');
