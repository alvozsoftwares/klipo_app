<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () { return view('site.home'); })->name('home');
Route::get('/planos-e-precos', function () { return view('site.home'); })->name('planos');
Route::get('/contato', function () { return view('site.home'); })->name('contato');
Route::get('/politica-de-privacidade', function () { return view('site.privacidade'); })->name('privacidade');
Route::get('/termos-de-uso', function () { return view('site.termos'); })->name('termos');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
