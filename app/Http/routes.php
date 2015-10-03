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

//$router->get('test', 'TestController@index');



$router->resource('profile', 'ProfileController');
$router->resource('journal', 'JournalController');
$router->resource('medicine', 'MedicineController');
$router->resource('profile', 'ProfileController');

// These keep causing errors in Laravel? Not sure why
//$router->post('user/login','UserAccountController@login');
//$router->get('user/login','UserAccountController@logout');

