<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EstanteController;
use App\Http\Controllers\ProtocoloEntrada;
use App\Http\Controllers\UserController;
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
//LOGIN

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login/store', [UserController::class, 'storeLogin'])->name('login.store');
Route::get('/logout/{id}', [UserController::class, 'logout'])->name('logout');
//DASHBOARD
Route::middleware('autenticador')->group(function(){

    Route::prefix('/dashboard')->group(function(){
        Route::get('/index', [DashboardController::class, 'index'])->name('dashboard');
    });

    Route::prefix('/estante')->group(function(){
        Route::get('/index', [EstanteController::class, 'index'])->name('estante.index');
        Route::get('/equipamentos', [EstanteController::class, 'status'])->name('estante.equipamentos');
        Route::get('/pesquisa', [EstanteController::class, 'pesquisa']);
        Route::post('/filtros', [EstanteController::class, 'filtros']);
        Route::get('/show/{id}', [EstanteController::class, 'show']);
        Route::post('/passar', [EstanteController::class, 'passar']);
    });

    Route::prefix('/protocolo/entrada')->group(function(){
        Route::get('/create', [ProtocoloEntrada::class, 'create'])->name('protocolo.create');
    });

});
