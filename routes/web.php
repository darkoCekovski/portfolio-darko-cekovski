<?php

use App\Livewire\HomePage;
//use App\Livewire\AboutPage;
//use App\Livewire\ProjectsPage;
//use App\Livewire\ContactPage;
//use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('home');
//Route::get('/about', AboutPage::class)->name('about');
//Route::get('/projects', ProjectsPage::class)->name('projects');
//Route::get('/projects/{id}', function ($id) {
//    return view('project-detail', ['project' => \App\Models\Project::findOrFail($id)]);
//})->name('project.detail');
//Route::get('/contact', ContactPage::class)->name('contact');

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});
//
//require __DIR__.'/auth.php';
