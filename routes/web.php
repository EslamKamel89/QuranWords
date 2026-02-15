<?php

use App\Models\Root;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\Admin\Categories\Index as CategoriesIndex;
use App\Livewire\Admin\Categories\Create as CategoriesCreate;
use App\Livewire\Admin\Categories\Edit as CategoriesEdit;
use App\Livewire\Admin\Questions\Index as QuestionsIndex;
use App\Livewire\Admin\Questions\Create as QuestionsCreate;
use App\Livewire\Admin\Questions\Edit as QuestionsEdit;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return redirect()->route('dashboard');
})->name('home');


// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    Volt::route('/admin/dashboard', 'admin.dashboard.index')
        ->name('dashboard');
    Volt::route('/admin/roots', 'admin.roots.index')
        ->name('roots.index');
    Volt::route('/admin/roots/create', 'admin.roots.create')
        ->name('roots.create');
    Volt::route('/admin/roots/{root}/edit', 'admin.roots.edit')
        ->name('roots.edit');
    Volt::route('/admin/roots/{root}', 'admin.root.index')
        ->name('roots.show');
});
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/categories', CategoriesIndex::class)->name('categories.index');
    Route::get('/categories/create', CategoriesCreate::class)->name('categories.create');
    Route::get('/categories/{category}/edit', CategoriesEdit::class)->name('categories.edit');

    Route::get('/questions', QuestionsIndex::class)->name('questions.index');
    Route::get('/questions/create', QuestionsCreate::class)->name('questions.create');
    Route::get('/questions/{question}/edit', QuestionsEdit::class)->name('questions.edit');
});

Route::get('/test', function () {
    $root = Root::with(['words.verse', 'words.surah'])->where('id', 30)->first();
    return $root;
});
Route::get('/artisan', function () {
    Artisan::call('migrate');

    return response()->json(['message' => 'Migration executed!']);
});

require __DIR__ . '/auth.php';
