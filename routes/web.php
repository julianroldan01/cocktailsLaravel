<?php

use App\Http\Controllers\CocktailController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Rutas para los cócteles
    Route::get('/cocktails', [CocktailController::class, 'index'])->name('cocktails.index');
    Route::post('/cocktails/store', [CocktailController::class, 'store'])->name('cocktails.store');
    Route::get('/cocktails/saved', [CocktailController::class, 'saved'])->name('cocktails.saved');
    Route::delete('/cocktails/{id}', [CocktailController::class, 'destroy'])->name('cocktails.destroy');
    Route::put('/cocktails/{id}', [CocktailController::class, 'update'])->name('cocktails.update');

});

require __DIR__.'/auth.php';
