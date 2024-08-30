<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\GameController;
use \App\Http\Controllers\ChatController;
use App\Http\Middleware\GameMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/game', GameController::class)->name('game')->middleware(GameMiddleware::class);
Route::post('/chat', ChatController::class)->name('chat');
