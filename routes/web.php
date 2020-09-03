<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'AutenticarController@get_autenticar');
Route::post('/', 'AutenticarController@post_autenticar');

Route::post('/deslogar', 'AutenticarController@deslogar');


Route::group(['middleware' => ['autenticar']], function(){

    //pagina inicaial
    Route::get('/home', 'BoxController@index');

    Route::post('/search-box', 'BoxController@searchBox');
    Route::post('/edit-box', 'BoxController@editBox');
    Route::post('/add-box', 'BoxController@addBox');
    Route::post('/delete-box', 'BoxController@deleteBox');
    
    Route::get('/exp', 'BoxController@exp');
    Route::post('/table-exp', 'BoxController@tableExp');
    
    Route::post('/add-log', 'LogUserController@addLog');
    Route::get('/logs', 'LogUserController@logs_tela');
    Route::post('/logs-results', 'LogUserController@relatorioLog');
    
});
