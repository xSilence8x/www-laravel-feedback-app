<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->string('experience_level');
            $table->boolean('knows_html')->default(false);
            $table->boolean('knows_css')->default(false);
            $table->boolean('knows_javascript')->default(false);
            $table->boolean('knows_server_side')->default(false);
            $table->boolean('knows_database')->default(false);
            $table->unsignedTinyInteger('lectures_value_rating');
            $table->unsignedTinyInteger('content_interest_rating');
            $table->unsignedTinyInteger('clarity_rating');
            $table->unsignedTinyInteger('pace_rating');
            $table->unsignedTinyInteger('practical_examples_rating');
            $table->unsignedTinyInteger('teacher_explanation_rating');
            $table->unsignedTinyInteger('difficulty_rating');
            $table->unsignedTinyInteger('recommendation_rating');
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
