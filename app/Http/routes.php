<?php 
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
// Homepage
Route::get('/', function () {
    return view('welcome');
});

//Medicine Routes
Route::resource('medicine', 'MedicineController');

// Trigger routes
Route::resource('trigger', 'TriggerController');

// Test Routes
Route::get('test', 'TestController@index');

// Journal Routes
Route::get('journal', 'JournalController@index');

// User Routes
Route::resource('user', 'UserController');

// Authentication Routes
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Journal Routes
//$router->resource('journal', 'JournalController'); // once all routes work, will use this
$router->get('journal', 'JournalController@index');
$router->post('journal/create', 'JournalController@store');
$router->get('journal/create', 'JournalController@create');
$router->get('journal/{id}', 'JournalController@show');
$router->get('journal/{id}/edit', 'JournalController@edit');
Route::patch('journal/{id}/', 'JournalController@update');

$router->get('report/generate', 'ReportController@create');
$router->get('report/{id}', 'ReportController@show');
$router->get('report', 'ReportController@index');
