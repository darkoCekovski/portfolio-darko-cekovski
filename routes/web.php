<?php

use App\Livewire\HomePage;
use App\Livewire\AboutPage;
use App\Livewire\ProjectsPage;
use App\Livewire\ContactPage;
use App\Livewire\SkillsPage;
use App\Models\Project;
use App\Models\Skill;
use App\Http\Controllers\CvController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/en');

Route::group(['prefix' => '{locale}', 'where' => ['locale' => 'en|de']], function () {
    Route::get('/', HomePage::class)->name('home');
    Route::get('/about', AboutPage::class)->name('about');
    Route::get('/projects', ProjectsPage::class)->name('projects');
    Route::get('/projects/{id}', function ($locale, $id) {
        return view('project-detail', ['project' => Project::findOrFail($id)]);
    })->name('project.detail');
    Route::get('/contact', ContactPage::class)->name('contact');
    Route::get('/skills', SkillsPage::class)->name('skills');
    Route::get('/skill/{slug}', function ($locale, $slug) {
        $skill = Skill::where('name', \Illuminate\Support\Str::title(str_replace('-', ' ', $slug)))->firstOrFail();
        return view('skill-detail', ['skill' => $skill]);
    })->name('skill.detail');
    Route::get('/cv/download', [CvController::class, 'download'])->name('cv.download');
});



