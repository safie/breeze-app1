<?php

use App\Http\Controllers\IsuController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');


// Route::controller(IsuController::class)->group(
//     function () {
//         Route::get('/tetapan/isu', 'create')->name('noc.kementerian');
//         Route::get('noc/status1', 'nocStatus1')->name('noc.status1');
//     }
// )->middleware(['auth', 'verified']);

Route::get('tetapan/isu', [IsuController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('tetapan.isu');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
