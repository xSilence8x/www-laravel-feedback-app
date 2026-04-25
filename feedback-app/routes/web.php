<?php

use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;

Route::get('/feedbacks', [FeedbackController::class, 'index']);
Route::get('/feedback/{feedbackid}', [FeedbackController::class, 'show'])->whereNumber('feedbackid');
Route::get('/', [FeedbackController::class, 'create']);
