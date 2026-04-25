<?php

use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FeedbackController::class, 'home'])->name('home');
Route::get('/create-feedback', [FeedbackController::class, 'create'])->name('feedback.create');
Route::get('/feedbacks', [FeedbackController::class, 'index'])->name('feedback.index');
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index.alias');
Route::post('/feedbacks', [FeedbackController::class, 'store'])->name('feedback.store');
Route::get('/feedback/{feedbackid}', [FeedbackController::class, 'show'])->whereNumber('feedbackid')->name('feedback.show');
