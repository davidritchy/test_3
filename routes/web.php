<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BottleController;
use App\Http\Controllers\CellarBottleController;
use App\Http\Controllers\CellarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SetLocaleController;

use App\Http\Controllers\CellierBottleController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// User Routes
Route::get('/registration', [UserController::class, 'create'])->name('user.create');
Route::post('/registration', [UserController::class, 'store'])->name('user.store');
// Auth Routes
Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', [CellarController::class, 'index'])->name('cellar.index');
    /* Welcome */
    Route::get('/cellar/create', [CellarController::class, 'create'])->name('cellar.create');
    // Bottle Route
    Route::get('/bottles', [BottleController::class, 'index'])->name('bottle.index');
    Route::get('/bottle/{id}', [BottleController::class, 'details'])->name('bottle.details');
    Route::get('/scrape-bouteilles', [BottleController::class, 'scrape'])->name('bottle.scrape');
    Route::get('/cellarbottle', [CellarBottleController::class, 'index'])->name('cellarbottle.index');
    Route::get('/cellarbottle/{cellarbottle}', [CellarBottleController::class, 'del'])->name('cellarbottle.delete');
    // Cellar Routes
    Route::get('/cellars', [CellarController::class, 'index'])->name('cellar.index');
    Route::get('/cellar/{cellar}', [CellarController::class, 'show'])->name('cellar.show');
    Route::post('/cellar/store', [CellarController::class, 'store'])->name('cellar.store');
    Route::get('/edit/cellar/{cellar}', [CellarController::class, 'edit'])->name('cellar.edit');
    Route::put('/edit/cellar/{cellar}', [CellarController::class, 'update'])->name('cellar.update');
    Route::delete('/cellar/{cellar}', [CellarController::class, 'destroy'])->name('cellar.delete');
    Route::get('/cellar/add/{id}', [CellarController::class, 'add'])->name('cellar.add');    
    Route::post('/cellar/store-bottle', [CellarController::class, 'storeBottle'])->name('cellar.storeBottle');
    Route::get('/cellar/ajout/{id}', [CellarController::class, 'switch'])->name('cellar.return');
    // User Routes
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/profile', [UserController::class, 'show'])->name('user.show');
    // Route::get('/edit/user/{user}', [UserController::class, 'edit'])->name('user.edit');
});

Route::get('/lang/{locale}', [SetLocaleController::class, 'index'])->name('lang');





