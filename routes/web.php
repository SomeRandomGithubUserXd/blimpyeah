<?php

use App\Http\Controllers\BlimpYeahSoundsController;
use App\Http\Controllers\ProfileController;
use App\Models\BlimpYeahSound;
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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'blimpIsRunning' => BlimpYeahSound::where(['is_active' => true])->exists()
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['prefix' => 'blimp', 'as' => 'blimp.'], function () {
    Route::get('/latest_connections', [BlimpYeahSoundsController::class, 'deviceToBlimpStatus'])->name('device-to-blimp-status');
    Route::get('/status', [BlimpYeahSoundsController::class, 'show'])->name('status');
    Route::post('/start', [BlimpYeahSoundsController::class, 'start'])->name('start');
    Route::post('/stop', [BlimpYeahSoundsController::class, 'stop'])->name('stop');
});

Route::get("/sound", function () {
    return response()->file(public_path("sound.wav"));
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
