<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FeedbackController extends Controller
{
    public function home(): View
    {
        return view('home');
    }

    public function index(): View
    {
        $feedbacks = Feedback::query()
            ->select(['id', 'lectures_value_rating', 'created_at'])
            ->latest()
            ->get();

        return view('feedbacks.index', [
            'feedbacks' => $feedbacks,
        ]);
    }

    public function show(int $feedbackid): View
    {
        $feedback = Feedback::query()->findOrFail($feedbackid);

        return view('feedback.show', [
            'feedback' => $feedback,
        ]);
    }

    public function create(): View
    {
        return view('feedback.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'experience_level' => ['required', 'in:beginner,basic,advanced,practitioner,professional'],
            'knows_html' => ['nullable', 'boolean'],
            'knows_css' => ['nullable', 'boolean'],
            'knows_javascript' => ['nullable', 'boolean'],
            'knows_server_side' => ['nullable', 'boolean'],
            'knows_database' => ['nullable', 'boolean'],
            'lectures_value_rating' => ['required', 'integer', 'between:0,5'],
            'content_interest_rating' => ['required', 'integer', 'between:0,5'],
            'clarity_rating' => ['required', 'integer', 'between:0,5'],
            'pace_rating' => ['required', 'integer', 'between:0,5'],
            'practical_examples_rating' => ['required', 'integer', 'between:0,5'],
            'teacher_explanation_rating' => ['required', 'integer', 'between:0,5'],
            'difficulty_rating' => ['required', 'integer', 'between:0,5'],
            'recommendation_rating' => ['required', 'integer', 'between:0,5'],
            'note' => ['nullable', 'string', 'max:2000'],
        ]);

        $feedback = Feedback::query()->create([
            ...$validated,
            'knows_html' => $request->boolean('knows_html'),
            'knows_css' => $request->boolean('knows_css'),
            'knows_javascript' => $request->boolean('knows_javascript'),
            'knows_server_side' => $request->boolean('knows_server_side'),
            'knows_database' => $request->boolean('knows_database'),
        ]);

        $request->session()->flash('status', 'Dekujeme za zpetnou vazbu.');

        return new RedirectResponse('/feedback/'.$feedback->id, 302, [
            'Cache-Control' => 'no-store, no-cache, must-revalidate',
        ]);
    }
}
