<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('index');


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'showDashboard'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/create-question', [QuestionController::class, 'createQuestion'])->name('create-question');
    Route::post('/add-question', [QuestionController::class, 'addQuestion'])->name('add-question');
    Route::get('/edit-question/{questionId}', [QuestionController::class, 'editQuestion'])->name('edit-question');
    Route::put('/update-question/{questionId}', [QuestionController::class, 'updateQuestion'])->name('update-question');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user-dashboard');
});


require __DIR__.'/auth.php';
