<?php

Route::get('/', 'EstoqueController@index');
Route::resource('produtos', 'ProdutoController',  ['except' => [
    'show'
]]);
Route::resource('estoque', 'EstoqueController',  ['only' => [
    'show', 'store', 'update'
]]);
