<?php

use App\Models\Root;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

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
});

// Route::get('/test', function () {
//     $word = new App\Models\Word;
//     $observerClass = App\Observers\WordObserver::class;

//     dd($word->getObservableEvents(), array_search($observerClass, $word->getGlobalObservers()));
// });

require __DIR__ . '/auth.php';
