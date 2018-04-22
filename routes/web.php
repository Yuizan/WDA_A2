<?php

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
Route::get('/', function () {
    return view('home');
});

Route::get('/form', 'uploadFormController@index');

Route::post('/form_action','uploadFormController@store');

Route::get('/manage', 'ManageController@index');
Route::post('/manage_action','ManageController@edit');
Route::get('/view', 'ManageController@view');
Route::get('/register', 'UsersController@index');
Route::post('/register_action', 'UsersController@store');
Route::get('/login','UsersController@login');
Route::get('/logout', 'UsersController@logout');
Route::post('/login_action', 'UsersController@loginAction');

//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');


