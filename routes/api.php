<?php

use Illuminate\Support\Facades\Route;

// API routes for games
Route::prefix('games')->group(function () {
    Route::get('/', 'GameController@index');
    Route::get('/{id}', 'GameController@show');
    Route::post('/', 'GameController@store');
    Route::put('/{id}', 'GameController@update');
    Route::delete('/{id}', 'GameController@destroy');
});

// API routes for users
Route::prefix('users')->group(function () {
    Route::get('/', 'UserController@index');
    Route::get('/{id}', 'UserController@show');
    Route::post('/', 'UserController@store');
    Route::put('/{id}', 'UserController@update');
    Route::delete('/{id}', 'UserController@destroy');
});

// API routes for catalog
Route::prefix('catalog')->group(function () {
    Route::get('/', 'CatalogController@index');
    Route::get('/{id}', 'CatalogController@show');
});

// API routes for forum
Route::prefix('forum')->group(function () {
    Route::get('/', 'ForumController@index');
    Route::get('/{id}', 'ForumController@show');
    Route::post('/', 'ForumController@store');
    Route::put('/{id}', 'ForumController@update');
    Route::delete('/{id}', 'ForumController@destroy');
});

// API routes for messages
Route::prefix('messages')->group(function () {
    Route::get('/', 'MessageController@index');
    Route::get('/{id}', 'MessageController@show');
    Route::post('/', 'MessageController@store');
    Route::delete('/{id}', 'MessageController@destroy');
});

?>