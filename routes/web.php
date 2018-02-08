<?php

Route::get('/', function() {
    return redirect()
        ->route('produtos.index');
});
Route::resource('produtos', 'ProdutoController',  ['except' => [
    'show'
]]);
Route::resource('estoque', 'EstoqueController',  ['only' => [
    'show', 'store', 'update'
]]);
