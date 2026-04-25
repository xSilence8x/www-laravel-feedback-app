<?php

use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;

Route::get('/feedbacks', [FeedbackController::class, 'index'])->name('feedback.index');
Route::post('/feedbacks', [FeedbackController::class, 'store'])->name('feedback.store');
Route::get('/feedback/{feedbackid}', [FeedbackController::class, 'show'])->whereNumber('feedbackid')->name('feedback.show');
Route::get('/', [FeedbackController::class, 'create'])->name('feedback.create');
