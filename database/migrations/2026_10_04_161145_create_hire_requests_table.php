<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hire_requests', function (Blueprint $table) {
            $table->id();
            $table->string('intent', 16);                  // 'project' | 'role'
            $table->string('name');
            $table->string('email');
            $table->string('language', 2);                 // preferred language for the reply
            $table->string('ui_locale', 2);                // language of the site when the form was sent
            $table->string('timeline', 16);                // asap | 1to3m | flexible
            $table->string('budget', 16)->nullable();      // project path only
            $table->json('project_types')->nullable();     // project path only
            $table->text('description')->nullable();       // project path only
            $table->string('link')->nullable();            // project path only: existing site or repository
            $table->string('company')->nullable();         // role path only
            $table->string('role_title')->nullable();      // role path only
            $table->string('work_model', 16)->nullable();  // role path only
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hire_requests');
    }
};
