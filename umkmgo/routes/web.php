<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;



Route::get('/', function () {
    return redirect()->route(auth()->check() ? 'home' : 'login');
});

// Auth routes (login, register, etc.)
Auth::routes();

Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Profile UMKM routes
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    // Forum Diskusi
    Route::resource('forum', ForumController::class)->except(['destroy']);
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

    // Forum delete only admin
    Route::delete('/forum/{forum}', [ForumController::class, 'destroy'])->name('forum.destroy');


    // Quiz
    Route::get('/kuis', [QuizController::class, 'kategori'])->name('kategori.index');
    Route::get('/kategori/{id}/kuis', [QuizController::class, 'index'])->name('quiz.index');
    Route::get('/kuis/{id}', [QuizController::class, 'index'])->name('quiz.intro');
    Route::post('/quiz/{id}/submit', [QuizController::class, 'submit'])->name('quiz.submit');
    Route::get('/kuis/{id}', [QuizController::class, 'show'])->name('quiz.show');
    Route::get('/quiz/{id}/attempt', [QuizController::class, 'attempt'])->name('quiz.attempt');
    Route::post('/kuis/hasil', [QuizController::class, 'result'])->name('quiz.result');

    
    Route::get('/quiz/final', [QuizController::class, 'finalQuiz'])->name('quiz.final');
    Route::post('/quiz/final/{id}/submit', [QuizController::class, 'finalSubmit'])->name('quiz.final_submit');
    Route::get('/quiz/final/{id}', [QuizController::class, 'finalShow'])->name('quiz.final_show');
    Route::post('/quiz/final/{id}/result', [QuizController::class, 'finalResult'])->name('quiz.final_result');
    Route::get('quiz/final/{id}/attempt', [QuizController::class, 'finalAttempt'])->name('quiz.final_attempt');


    
    // Route resource untuk semua authenticated user (kecuali destroy)
    Route::resource('classes', \App\Http\Controllers\ClassController::class)->except(['destroy']);
    Route::delete('/classes/{class}', [\App\Http\Controllers\ClassController::class, 'destroy'])->name('classes.destroy');

    // Route tambahan khusus class (jika tidak termasuk dalam resource)
    Route::get('/list', [\App\Http\Controllers\ClassController::class, 'listClasses'])->name('classes.list');
    Route::get('/quiz/final/{id}', [QuizController::class, 'finalIntro'])->name('quiz.final_intro');
    Route::get('/classes/certificate/{id}', [\App\Http\Controllers\ClassController::class, 'certificate'])->name('classes.certificate');
    

    
    // Article routes accessible to all authenticated users except destroy
    Route::resource('articles', ArticleController::class)->except(['destroy']);
    Route::resource('articles', ArticleController::class)->except(['destroy']);

    // Article delete only admin
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->middleware('admin')->name('articles.destroy');

    // Admin user management and other admin features
    Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
        Route::get('/users', [AdminController::class, 'index'])->name('admin.users.index');
        Route::post('/users/{user}/update-role', [AdminController::class, 'updateRole'])->name('admin.users.updateRole');
    });
        // Admin certificate assignment routes
        Route::get('/certificates/assign', [AdminController::class, 'assignCertificateForm'])->name('admin.certificates.assign');
        Route::post('/certificates', [AdminController::class, 'storeCertificate'])->name('admin.certificates.store');
    });
