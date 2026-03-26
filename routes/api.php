<?php

use App\Http\Controllers\Api\LegacyCharacterController;
use App\Http\Controllers\Api\RobloxApiController;
use Illuminate\Support\Facades\Route;

Route::get('/GetCharacterAppearance.php', [LegacyCharacterController::class, 'appearanceByUsername']);
Route::get('/GetCharacterAppearanceById.php', [LegacyCharacterController::class, 'appearanceById']);

Route::get('/charapp.php', [RobloxApiController::class, 'charapp']);
Route::get('/addplayer.php', [RobloxApiController::class, 'addPlayer']);
Route::get('/removeplayer.php', [RobloxApiController::class, 'removePlayer']);
Route::get('/updateplayers.php', [RobloxApiController::class, 'updatePlayers']);
Route::get('/get_user_thumbnail.php', [RobloxApiController::class, 'userThumbnail']);
