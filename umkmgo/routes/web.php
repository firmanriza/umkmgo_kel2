<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ArticleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Arahkan root '/' ke login jika belum login, ke dashboard jika sudah login
Route::get('/', function () {
    return redirect()->route(auth()->check() ? 'home' : 'login');
});



// Auth routes (login, register, etc.)
Auth::routes();

// Routes yang butuh login
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Forum Diskusi
    Route::resource('forum', ForumController::class);
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    

    // Quiz
    Route::get('/quiz', [QuizController::class, 'kategori'])->name('kategori.index');
    Route::get('/kategori/{id}/kuis', [QuizController::class, 'index'])->name('quiz.index');
    Route::get('/kuis/{id}', [QuizController::class, 'show'])->name('quiz.show');
    Route::post('/kuis/hasil', [QuizController::class, 'result'])->name('quiz.result');
    Route::get('/quiz/{id}/attempt', [QuizController::class, 'attempt'])->name('quiz.attempt');
    Route::post('/quiz/{id}/submit', [QuizController::class, 'submit'])->name('quiz.submit');

    // Final Quiz Routes with Summary and Answer Saving
    Route::prefix('quiz/final')->group(function () {
        Route::get('/', [QuizController::class, 'finalQuiz'])->name('quiz.final');
        Route::get('/{id}', [QuizController::class, 'finalIntro'])->name('quiz.final_intro');
        Route::get('/{id}/attempt', [QuizController::class, 'finalAttempt'])->name('quiz.final_attempt');
        Route::get('/{id}/summary', [QuizController::class, 'finalSummary'])->name('quiz.final_summary');
        Route::post('/{id}/save-answer', [QuizController::class, 'saveAnswer'])->name('quiz.save_answer');
        Route::post('/{id}/submit', [QuizController::class, 'finalSubmit'])->name('quiz.final_submit');
    });

    //edukasi
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
    Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

});