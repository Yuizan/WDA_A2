<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'cors'], function () {

//list
Route::get('productCRUD/list','ProductCRUD@index');
Route::get('productCRUD/tech','ProductCRUD@allTech');
Route::get('productCRUD/unassignTicket','ProductCRUD@unassignTicket');


//store tech
Route::post('productCRUD/tech', 'ProductCRUD@storeTech');
Route::post('productCRUD/assignPendingTicket', 'ProductCRUD@assignPendingTicket');
Route::post('productCRUD/assignTicket','ProductCRUD@assignTicket');
Route::post('productCRUD/techAssignTicket','ProductCRUD@techAssignTicket');
});