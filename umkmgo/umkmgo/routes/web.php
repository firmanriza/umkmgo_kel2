<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserDashboardController;




Route::get('/', function () {
    return redirect()->route(auth()->check() ? 'home' : 'login');
});

// Auth routes (login, register, etc.)
Auth::routes();

Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('home');

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

    // Final Quiz Routes with Summary and Answer Saving
    Route::prefix('quiz/final')->group(function () {
        Route::get('/', [QuizController::class, 'finalQuiz'])->name('quiz.final');
        Route::get('/{id}', [QuizController::class, 'finalIntro'])->name('quiz.final_intro');
        Route::get('/{id}/attempt', [QuizController::class, 'finalAttempt'])->name('quiz.final_attempt');
        Route::get('/{id}/summary', [QuizController::class, 'finalSummary'])->name('quiz.final_summary');
        Route::post('/{id}/save-answer', [QuizController::class, 'saveAnswer'])->name('quiz.save_answer');
        Route::post('/{id}/submit', [QuizController::class, 'finalSubmit'])->name('quiz.final_submit');
        
    });
    // Classes routes
    // Route::prefix('classes')->group(function () {
    //     Route::get('/', [\App\Http\Controllers\ClassController::class, 'index'])->name('classes.index');
    //     Route::get('/list', [\App\Http\Controllers\ClassController::class, 'listClasses'])->name('classes.list');
    //     Route::get('/{id}', [\App\Http\Controllers\ClassController::class, 'show'])->name('classes.show');
    //     Route::get('/{kategori_umkm_id}/final-quiz', [\App\Http\Controllers\ClassController::class, 'finalQuiz'])->name('classes.final_quiz');
    //     Route::get('/certificate/{id}', [\App\Http\Controllers\ClassController::class, 'certificate'])->name('classes.certificate');

    //     // Admin-only CRUD routes for classes
    //     Route::middleware('admin')->group(function () {
    //         Route::get('/create', [\App\Http\Controllers\ClassController::class, 'create'])->name('classes.create');
    //         Route::post('/', [\App\Http\Controllers\ClassController::class, 'store'])->name('classes.store');
    //         Route::get('/{id}/edit', [\App\Http\Controllers\ClassController::class, 'edit'])->name('classes.edit');
    //         Route::put('/{id}', [\App\Http\Controllers\ClassController::class, 'update'])->name('classes.update');
    //         Route::delete('/{id}', [\App\Http\Controllers\ClassController::class, 'destroy'])->name('classes.destroy');
    //     });
    // });
    
    // Route resource untuk semua authenticated user (kecuali destroy)
    Route::resource('classes', \App\Http\Controllers\ClassController::class)->except(['destroy']);

    // Route khusus untuk delete class oleh admin
    // Route::delete('/classes/{class}', [\App\Http\Controllers\ClassController::class, 'destroy'])
    //     ->middleware('admin')
    //     ->name('classes.destroy');

    Route::delete('/classes/{class}', [\App\Http\Controllers\ClassController::class, 'destroy'])->name('classes.destroy');

    // Route tambahan khusus class (jika tidak termasuk dalam resource)
    Route::get('/list', [\App\Http\Controllers\ClassController::class, 'listClasses'])->name('classes.list');
    Route::get('/classes/{kategori_umkm_id}/final-quiz', [\App\Http\Controllers\ClassController::class, 'finalQuiz'])->name('classes.final_quiz');
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

    Route::get('/dashboard', [UserDashboardController::class, 'index'])->middleware('auth')->name('dashboard');