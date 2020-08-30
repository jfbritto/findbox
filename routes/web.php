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

    //instalações abertas
    // Route::get('/instalacoes-abertas', 'BoxController@instalacoes_abertas_tela');
    // Route::post('/instalacoes-abertas', 'BoxController@instalacoes_abertas');
    // Route::post('/instalacoes-abertas-plano-setor', 'BoxController@instalacoes_abertas_plano_setor');

});
