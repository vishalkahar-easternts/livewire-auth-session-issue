<?php

use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:web', 'adminAuth'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('livewire.dashboard');
});

// Route::get('/', function () {
//     return view('welcome');
// });
