<?php


Route::get('/', function () {
    return view('app');
});

Route::post('oauth/access_token', function () {
    return Response::json(Authorizer::issueAccessToken());
});

Route::get('user/authenticated','UserController@authenticated');


//Route::group(['middleware' => 'oauth'], function () {

    Route::resource('client', 'ClientController', ['except' => ['create', 'edit']]);
    Route::group(['prefix' => 'project'], function () {
        Route::get('{id}/notes', 'ProjectNoteController@index');
        Route::get('{project_id}/notes/{id}', 'ProjectNoteController@show');
        Route::post('{project_id}/notes', 'ProjectNoteController@store');
        Route::put('{project_id}/notes/{id}', 'ProjectNoteController@update');
        Route::delete('{project_id}/notes/{id}', 'ProjectNoteController@destroy');
        Route::post('{project_id}/file', 'ProjectFileController@store');
    });

    Route::resource('project', 'ProjectController', ['except' => ['create', 'edit']]);
    //Route::resource('project/notes','ProjectController',['except'=>['create','edit']]);

//});

