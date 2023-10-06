<?php

use App\Http\Controllers\LadderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SummonerController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/', [LadderController::class, 'frontpage'])->name('frontpage');

Route::get('/ladders', [LadderController::class, 'ladder'])->name('ladders');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/summoner/index', [SummonerController::class, 'index'])->name('summoner.index');
    Route::get('/summoner/create', [SummonerController::class, 'create'])->name('summoner.create');
    Route::post('/summoner', [SummonerController::class, 'store'])->name('summoner.store')->middleware('auth');
    Route::get('/summoner/edit', [SummonerController::class, 'edit'])->name('summoner.edit');
    Route::put('/summoner/{id}', [SummonerController::class, 'update'])->name('summoner.update');
    Route::delete('/summoner/{id}', [SummonerController::class, 'destroy'])->name('summoner.destroy');
    // Add other routes as needed
});

require __DIR__.'/auth.php';
