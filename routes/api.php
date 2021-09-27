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

//pets
Route::get('/pets', 'PetsController@index');
Route::get('/pets/{name}', 'PetsController@show');
Route::post('/pets/', 'PetsController@store');
Route::delete('pets/{id}', 'PetsController@delete');

//attendance
Route::get('/attendance', 'AttendanceController@index');
Route::post('/attendance/', 'AttendanceController@store');
Route::get('/attendance/formatted', 'AttendanceController@getformatted');
