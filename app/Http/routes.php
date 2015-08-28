<?php



Route::get('/', function () {
    return view('welcome');
});
Route::get('client','ClientController@index');
Route::get('client/{id}','ClientController@show');
Route::delete('client/{id}','ClientController@destroy');
Route::post('client','ClientController@store');
Route::put('client/{id}','ClientController@update');