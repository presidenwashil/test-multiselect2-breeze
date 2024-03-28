<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('patient', 'patient')
    ->middleware(['auth'])
    ->name('patient');

Route::get('user-products', \App\Livewire\Pages\UserProduct::class)
    ->middleware(['auth'])
    ->name('user-products');

require __DIR__.'/auth.php';
