<?php

use Illuminate\Http\Request;

Route::group(['prefix' => 'v1'], function () {
    Route::get('/estoque', function (Request $request) {
        return 'olá mundo';
    });
});
