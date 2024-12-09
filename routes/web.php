<?php

use App\Http\Controllers\EventsController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HistoryCardsController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [MainPageController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::resource('/main-page', MainPageController::class)->middleware(['auth', 'verified'])->names('main-page');
Route::resource('/event', EventsController::class)->middleware(['auth', 'verified'])->names('event');
Route::resource('/timeline', HistoryCardsController::class)->middleware(['auth', 'verified'])->names('timeline');
Route::resource('/feedback', FeedbackController::class)->middleware(['auth', 'verified'])->names('feedback');
Route::get('/feedback-new', [FeedbackController::class, 'shareFeedback']);
Route::get('/feedback-success', function(){
    return view('feedbacks.feedback_success');
})->name('success');
Route::post('/feedback-store', [FeedbackController::class, 'feedback'])->name('feedback.share');
Route::resource('/registered-doctors', RegistrationController::class)->middleware(['auth', 'verified'])->names('registered-doctors');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
