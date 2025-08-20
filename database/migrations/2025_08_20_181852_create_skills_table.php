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
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // e.g., "Laravel"
            $table->text('description')->nullable(); // Skill description
            $table->tinyInteger('proficiency')->default(0); // 1-10 scale
            $table->string('logo')->nullable(); // Path to logo (e.g., "/images/skills/laravel.svg")
            $table->string('learning_source')->nullable(); // e.g., "Laravel Docs, Udemy"
            $table->string('experience_duration')->nullable(); // e.g., "2 years"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
