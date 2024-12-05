<?php

use App\Http\Controllers\EventsController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HistoryCardsController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [MainPageController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::resource('/main-page', MainPageController::class)->middleware(['auth', 'verified'])->names('main-page');
Route::resource('/event', EventsController::class)->middleware(['auth', 'verified'])->names('event');
Route::resource('/timeline', HistoryCardsController::class)->middleware(['auth', 'verified'])->names('timeline');
Route::resource('/feedback', FeedbackController::class)->middleware(['auth', 'verified'])->names('feedback');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
