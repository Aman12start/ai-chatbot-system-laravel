<?php

use App\Http\Controllers\ChatController;

Route::middleware('auth:sanctum')->post('/chat', [ChatController::class, 'sendMessage']);