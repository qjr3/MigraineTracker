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
Route::get('/', function(){
 return view('welcome');   
});

Route::group(['middleware' => 'auth'], function(){
    //Medicine Routes
    Route::resource('medicine', 'MedicineController');

    // Trigger routes
    Route::resource('trigger', 'TriggerController');

    // Journal Routes
    Route::resource('journal', 'JournalController');

    // User Routes
    Route::resource('user', 'UserController');

    Route::get('report/generate', 'ReportController@create');
    Route::get('report/{id}', 'ReportController@show');
    Route::get('report', 'ReportController@index');
});

// Authentication Routes
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

//Page Routes
Route::get('home', 'PagesController@dashboard');
Route::get('privacy', 'PagesController@privacy');
Route::get('terms', 'PagesController@terms');
Route::get('about', 'PagesController@about');
