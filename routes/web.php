<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\HomePage;
use App\Livewire\AboutPage;
use App\Livewire\ProjectsPage;
use App\Livewire\ContactPage;
use App\Models\Project;

Route::get('lang/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'de'])) {
        abort(400);
    }

    session(['locale' => $locale]);
    return redirect()->back();
})->name('lang.switch');

// Default redirect (optional)
Route::redirect('/', '/en');

// Localized routes
Route::group(['prefix' => '{locale}', 'where' => ['locale' => 'en|de']], function () {
    Route::get('/', HomePage::class)->name('home');
    Route::get('/about', AboutPage::class)->name('about');
    Route::get('/projects', ProjectsPage::class)->name('projects');
    Route::get('/projects/{id}', function ($id) {
        return view('project-detail', ['project' => Project::findOrFail($id)]);
    })->name('project.detail');
    Route::get('/contact', ContactPage::class)->name('contact');
});


Route::get('/debug-locale', function () {
    return response()->json([
        'app_locale' => app()->getLocale(),
        'session_locale' => session('locale'),
    ]);
});
