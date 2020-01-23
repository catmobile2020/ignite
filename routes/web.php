<?php

Route::group(['prefix'=>'/admin','namespace'=>'Admin','as'=>'admin.'],function (){
    Route::group(['prefix'=>'/'],function (){
        Route::get('/login','AuthController@index')->name('login');
        Route::post('/login','AuthController@login')->name('login');
        Route::get('/logout','AuthController@logout')->name('logout');
    });

    Route::group(['middleware'=>['auth']],function (){
        Route::get('/','HomeController@index')->name('home');

        Route::get('/profile','ProfileController@index')->name('profile');
        Route::post('/profile','ProfileController@update')->name('profile.update');
        Route::resource('clients','ClientController');
        Route::get('clients/{client}/destroy','ClientController@destroy')->name('clients.destroy');
        Route::get('clients/destroy/all-data','ClientController@destroyAll')->name('clients.destroyAll');
        Route::get('clients/destroy/registers','ClientController@destroyRegistered')->name('clients.destroyRegistered');

    });
});


Route::group(['prefix'=>'/','namespace'=>'Site','as'=>'site.'],function (){
    Route::get('/','HomeController@index')->name('home');
    Route::get('/search','HomeController@getSearch')->name('search');
    Route::post('/search','HomeController@search');
});

