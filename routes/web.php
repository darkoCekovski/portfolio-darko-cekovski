<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\HomePage;
use App\Livewire\AboutPage;
use App\Livewire\ProjectsPage;
use App\Livewire\ContactPage;
use App\Models\Project;

Route::redirect('/', '/en');

Route::group(['prefix' => '{locale}', 'where' => ['locale' => 'en|de']], function () {
    Route::get('/', HomePage::class)->name('home');
    Route::get('/about', AboutPage::class)->name('about');
    Route::get('/projects', ProjectsPage::class)->name('projects');
    Route::get('/projects/{id}', function ($locale, $id) {
        return view('project-detail', ['project' => Project::findOrFail($id)]);
    })->name('project.detail');
    Route::get('/contact', ContactPage::class)->name('contact');
});

