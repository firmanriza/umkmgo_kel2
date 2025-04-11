<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\QuizController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(); 

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('forum', ForumController::class);
});


Route::get('/quiz', [QuizController::class, 'kategori'])->name('kategori.index');
Route::get('/kategori/{id}/kuis', [QuizController::class, 'index'])->name('quiz.index');

Route::get('/kuis/{id}', [QuizController::class, 'show'])->name('quiz.show');

Route::post('/kuis/hasil', [QuizController::class, 'result'])->name('quiz.result');

Route::get('/quiz/{id}/attempt', [QuizController::class, 'attempt'])->name('quiz.attempt');
Route::post('/quiz/{id}/submit', [QuizController::class, 'submit'])->name('quiz.submit');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
