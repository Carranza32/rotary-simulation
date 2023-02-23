<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RotaryFormController;
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
    return to_route('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [RotaryFormController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(RotaryFormController::class)->name('simulation.')->group(function () {
        Route::get('/simulation/{id?}', 'form')->name('form');

        Route::post('/simulation/step/1', 'saveStep1')->name('save.step1');
        Route::post('/simulation/step/2', 'saveStep2')->name('save.step2');
        Route::post('/simulation/step/3', 'saveStep3')->name('save.step3');
        Route::post('/simulation/step/4', 'saveStep4')->name('save.step4');
        Route::post('/simulation/step/5', 'saveStep5')->name('save.step5');
        Route::post('/simulation/step/6', 'saveStep6')->name('save.step6');
        Route::post('/simulation/step/7', 'saveStep7')->name('save.step7');
        Route::post('/simulation/step/8', 'saveStep8')->name('save.step8');
        Route::post('/simulation/step/9', 'saveStep9')->name('save.step9');
        Route::post('/simulation/step/10', 'saveStep10')->name('save.step10');
        Route::post('/simulation/step/11', 'saveStep11')->name('save.step11');
        Route::post('/simulation/step/11/documents', 'saveStep11Documents')->name('save.step11.documents');
        Route::post('/simulation/step/12', 'saveStep12')->name('save.step12');
    });
});



require __DIR__.'/auth.php';
