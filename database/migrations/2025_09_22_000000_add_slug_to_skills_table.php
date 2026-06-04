<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\Skill;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('skills', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('name');
        });

        // Back-fill slugs for existing rows
        Skill::all()->each(function ($skill) {
            $skill->update(['slug' => Str::slug($skill->name)]);
        });

        Schema::table('skills', function (Blueprint $table) {
            $table->string('slug')->unique()->nullable(false)->change();
        });
    }

    public function down(): void
    {
        Schema::table('skills', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
