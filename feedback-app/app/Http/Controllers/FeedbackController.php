<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class FeedbackController extends Controller
{
    public function index(): JsonResponse
    {
        $feedbacks = Feedback::query()
            ->latest()
            ->get();

        return response()->json($feedbacks);
    }

    public function show(int $feedbackid): JsonResponse
    {
        $feedback = Feedback::query()->findOrFail($feedbackid);

        return response()->json($feedback);
    }

    public function create(): View
    {
        return view('hello');
    }
}
