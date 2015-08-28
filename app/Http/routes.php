<?php



Route::get('/', function () {
    return view('welcome');
});

Route::post('oauth/access_token',function(){
    return Response::json(Authorizer::issueAccessToken());
});

Route::get('client',['middleware'=>'oauth','uses'=>'ClientController@index']);
Route::get('client/{id}','ClientController@show');
Route::delete('client/{id}','ClientController@destroy');
Route::post('client','ClientController@store');
Route::put('client/{id}','ClientController@update');


Route::get('project/{id}/notes','ProjectNoteController@index');
Route::get('project/{project_id}/notes/{id}','ProjectNoteController@show');
Route::post('project/{project_id}/notes','ProjectNoteController@store');
Route::put('project/{project_id}/notes/{id}','ProjectNoteController@update');
Route::delete('project/{project_id}/notes/{id}','ProjectNoteController@destroy');

Route::get('project','ProjectController@index');
Route::get('project/{id}','ProjectController@show');
Route::delete('project/{id}','ProjectController@destroy');
Route::post('project','ProjectController@store');
Route::put('project/{id}','ProjectController@update');