<?php

namespace Database\Factories;

use App\Models\Feedback;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Feedback>
 */
class FeedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'experience_level' => fake()->randomElement([
                'beginner',
                'intermediate',
                'advanced',
            ]),
            'knows_html' => fake()->boolean(),
            'knows_css' => fake()->boolean(),
            'knows_javascript' => fake()->boolean(),
            'knows_server_side' => fake()->boolean(),
            'knows_database' => fake()->boolean(),
            'lectures_value_rating' => fake()->numberBetween(1, 5),
            'content_interest_rating' => fake()->numberBetween(1, 5),
            'clarity_rating' => fake()->numberBetween(1, 5),
            'pace_rating' => fake()->numberBetween(1, 5),
            'practical_examples_rating' => fake()->numberBetween(1, 5),
            'teacher_explanation_rating' => fake()->numberBetween(1, 5),
            'difficulty_rating' => fake()->numberBetween(1, 5),
            'recommendation_rating' => fake()->numberBetween(1, 5),
            'note' => fake()->optional(0.7)->sentence(),
        ];
    }
}
