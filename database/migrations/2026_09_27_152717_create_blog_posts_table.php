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
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->uuid('group_uuid')->index(); // links the EN and DE rows of the same post
            $table->string('locale', 2);          // 'en' | 'de'
            $table->foreignId('category_id')->constrained('blog_categories');
            $table->string('title');
            $table->string('slug');               // used in /blog/{slug}
            $table->longText('body');             // markdown source
            $table->string('image_path')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            $table->unique(['locale', 'slug']);        // slug must be unique per language
            $table->unique(['group_uuid', 'locale']);   // only one EN and one DE row per post group
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
