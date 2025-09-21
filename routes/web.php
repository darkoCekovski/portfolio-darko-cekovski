<?php

use App\Livewire\HomePage;
use App\Livewire\AboutPage;
use App\Livewire\ContactPage;
use App\Livewire\ServiceDetail;
use App\Livewire\ProjectDetail;
use App\Livewire\ProjectsPage;
use App\Livewire\SkillDetail;
use App\Livewire\SkillsPage;
use App\Http\Controllers\CvController;
use Illuminate\Support\Facades\Route;


Route::redirect('/', '/en');

Route::group(['prefix' => '{locale}', 'where' => ['locale' => 'en|de']], function () {
    Route::get('/', HomePage::class)->name('home');
    Route::get('/about', AboutPage::class)->name('about');
    Route::get('/contact', ContactPage::class)->name('contact');
    Route::get('/services/{service}',ServiceDetail::class)->name('service.detail');
    Route::get('/projects', ProjectsPage::class)->name('projects');
    Route::get('/project/{id}', ProjectDetail::class)->name('project.detail');
    Route::get('/skills', SkillsPage::class)->name('skills');
    Route::get('/skill/{slug}', SkillDetail::class)->name('skill.detail');
    Route::get('/cv/download', [CvController::class, 'download'])->name('cv.download');
});



