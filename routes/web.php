<?php

use App\Livewire\HomePage;
use App\Livewire\AboutPage;
use App\Livewire\ContactPage;
use App\Livewire\PrivacyPage;
use App\Livewire\ImprintPage;
use App\Livewire\ProjectDetail;
use App\Livewire\ProjectsPage;
use App\Livewire\SkillsPage;
use App\Http\Controllers\SkillApiController;
use App\Http\Controllers\ServiceApiController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/en');

Route::group(['prefix' => '{locale}', 'where' => ['locale' => 'en|de']], function () {
    Route::get('/',               HomePage::class)->name('home');
    Route::get('/about',          AboutPage::class)->name('about');
    Route::get('/contact',        ContactPage::class)->name('contact');
    Route::get('/privacy',        PrivacyPage::class)->name('privacy');
    Route::get('/imprint',        ImprintPage::class)->name('imprint');
    Route::get('/service/{name}', HomePage::class)->name('service.detail');
    Route::get('/projects',       ProjectsPage::class)->name('projects');
    Route::get('/project/{id}',   ProjectDetail::class)->name('project.detail');
    Route::get('/skills',         SkillsPage::class)->name('skills');
    Route::get('/skill/{slug}',   SkillsPage::class)->name('skill.detail');
});

Route::get('/api/skills/{slug}',    [SkillApiController::class, 'show']);
Route::get('/api/services/{name}',  [ServiceApiController::class, 'show']);
