<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::group(
// [
// 	'prefix' => LaravelLocalization::setLocale(),
// 	'middleware' => ['web']
// ],
Route::group([
	'prefix' => LaravelLocalization::setLocale(),
	'middleware'=>['localeSessionRedirect', 'localizationRedirect']], function(){
	Route::get('/', 'HomeController@index')->name('home');
});


Auth::routes();





Route::get('/logout', 'Auth\LoginController@logout');
//Route::get('/dashboard', 'AdminController@index');

// Route::get('/flights','HomeController@flights');
// 	Route::get('/flight/book/{id}','HomeController@viewFlight');

Route::group([
	'prefix' => LaravelLocalization::setLocale(),
	'middleware'=>['auth', 'localeSessionRedirect', 'localizationRedirect']], function(){
	
	Route::get('/flights','HomeController@flights')->name('flights');
	Route::get('/flight/view/{id}','HomeController@viewFlight');
	Route::post('flight-book','HomeController@bookFlight');
	Route::post('flight-request','HomeController@requestFlight');
	

});

Route::group(['middleware'=>['admin']], function(){
	Route::get('/dashboard', 'AdminController@index');
	Route::get('/dashboard/users', 'AdminController@users');
	Route::get('/dashboard/user/{id}', 'AdminController@userEdit');
	Route::put('/dashboard/user-update/{id}', 'AdminController@userUpdate');
	Route::delete('/dashboard/user-delete/{id}', 'AdminController@userDelete');

	Route::get('/dashboard/reservations', 'AdminController@reservations');
	Route::get('/dashboard/reservation/{id}', 'AdminController@reservationEdit');
	Route::put('/dashboard/reservation-update/{id}', 'AdminController@reservationUpdate');
	Route::delete('/dashboard/reservations-delete/{id}', 'AdminController@reservationDelete');

	Route::get('/dashboard/requests', 'AdminController@viewRequests');
	Route::get('/dashboard/requests/{id}', 'AdminController@requestEdit');
	Route::put('/dashboard/request-update/{id}', 'AdminController@requestUpdate');
	Route::delete('/dashboard/request-delete/{id}', 'AdminController@requestDelete');
});

// Route::get('/flights', function () {
//     // Only authenticated users may enter...
//     Route::get('/dashboard', 'AdminController@index');
//     Route::get('/flights','HomeController@flights');
// 	Route::get('/flight/book/{id}','HomeController@viewFlight');
// })->middleware('auth');

//Auth::routes(['verify' => true]);

//  Route::get('flights', function () {
//     // Only verified users may enter...
//     Route::get('/flights','HomeController@flights');
// 	Route::get('/flight/book/{id}','HomeController@viewFlight');
// })->middleware('verified');





Route::get('/detail', function () {
    return view('detail');
});

// Route::get('/about', function() {
// 		return redirect(\LaravelLocalization::getCurrentLocale().'/about/history');
// 	});
 Route::get('/page/{param}', 'HomeController@page');

 
