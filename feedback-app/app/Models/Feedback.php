<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'experience_level',
    'knows_html',
    'knows_css',
    'knows_javascript',
    'knows_server_side',
    'knows_database',
    'lectures_value_rating',
    'content_interest_rating',
    'clarity_rating',
    'pace_rating',
    'practical_examples_rating',
    'teacher_explanation_rating',
    'difficulty_rating',
    'recommendation_rating',
    'note',
])]
class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback';

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'knows_html' => 'boolean',
            'knows_css' => 'boolean',
            'knows_javascript' => 'boolean',
            'knows_server_side' => 'boolean',
            'knows_database' => 'boolean',
            'lectures_value_rating' => 'integer',
            'content_interest_rating' => 'integer',
            'clarity_rating' => 'integer',
            'pace_rating' => 'integer',
            'practical_examples_rating' => 'integer',
            'teacher_explanation_rating' => 'integer',
            'difficulty_rating' => 'integer',
            'recommendation_rating' => 'integer',
        ];
    }
}
