<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::middleware(['auth'])->group(function () {

    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');

    Route::post('/chat/send', [ChatController::class, 'send'])->name('chat.send');

});

require __DIR__.'/auth.php';