<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\GameController;
use \App\Http\Controllers\ChatController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/game', GameController::class)->name('game');
Route::post('/chat', ChatController::class)->name('chat');
