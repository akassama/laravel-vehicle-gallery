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

Route::get('/', 'CarController@home');
Route::resource('cars', 'CarController');
Route::get('user/{id}', 'UserController@show');
Route::get('contact/', 'ContactUsController@index');
Route::get('login/', 'LoginController@index');
Route::post('/login/authenticate', 'CarController@store');

//Route::get('/cars', 'CarController@index'); //uses car controller with default method index
//Route::get('/cars/index', 'CarController@index');
//Route::get('/cars/create', 'CarController@create');
//Route::post('/cars/create', 'CarController@store');
//Route::get('/cars/{carid}', 'CarController@show');
//Route::get('/cars/contact', 'CarController@contact');

