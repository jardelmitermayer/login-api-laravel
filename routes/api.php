<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('auth')->group( function() {
    Route::post('registro', 'App\Http\Controllers\AutenticadorControlador@registro');
    Route::post('login', 'App\Http\Controllers\AutenticadorControlador@login');

    Route::middleware('auth:api')->group(function () {        
        Route::post('logout', 'App\Http\Controllers\AutenticadorControlador@logout');
    });
});

Route::get('produtos', 'App\Http\Controllers\ProdutosControlador@index')
    ->middleware('auth:api');