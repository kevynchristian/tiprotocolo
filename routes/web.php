<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EstanteController;
use App\Http\Controllers\HistoricoController;
use App\Http\Controllers\InservivelController;
use App\Http\Controllers\ProtocoloEntrada;
use App\Http\Controllers\ProtocoloEntradaController;
use App\Http\Controllers\ProtocoloTombamentoController;
use App\Http\Controllers\UserController;
use App\Models\ProtocoloTombamento;
use App\Models\Role;
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

    Route::prefix('/protocolo')->group(function(){
        Route::get('/create', [ProtocoloEntradaController::class, 'create'])->name('protocolo.create');
        Route::post('/store', [ProtocoloEntradaController::class, 'store'])->name('protocolo.store');
        Route::get('/index', [ProtocoloEntradaController::class, 'index'])->name('protocolo.index');
        Route::get('/show/{id}', [ProtocoloEntradaController::class, 'show'])->name('protocolo.show');
        Route::delete('/destroy/{id}', [ProtocoloEntradaController::class, 'destroy'])->name('protocolo.destroy');
        Route::get('/mudaAno', [ProtocoloEntradaController::class, 'mudaAno'])->name('protocolo.ano');
        Route::get('/pesquisa', [ProtocoloEntradaController::class, 'pesquisa'])->name('protocolo.pesquisa');
    });

    Route::prefix('/protocolo-tombamento')->group(function(){
        Route::post('/store/{id}', [ProtocoloTombamentoController::class, 'store']);
        Route::delete('/destroy/{id}', [ProtocoloTombamentoController::class, 'destroy']);
        Route::get('/pdf/{id}', [ProtocoloTombamentoController::class, 'pdf']);
    });

    Route::prefix('/estante')->group(function(){
        Route::get('/index', [EstanteController::class, 'index'])->name('estante.index');
        Route::get('/equipamentos', [EstanteController::class, 'status'])->name('estante.equipamentos');
        Route::get('/pesquisa', [EstanteController::class, 'pesquisa']);
        Route::post('/filtros', [EstanteController::class, 'filtros']);
        Route::get('/show/{id}', [EstanteController::class, 'show']);
        Route::post('/passar', [EstanteController::class, 'passar']);
        Route::get('/create', [EstanteController::class, 'create'])->name('estante.create');
    });

    Route::prefix('/inservivel')->group(function(){
        Route::get('/create', [InservivelController::class, 'create'])->name('inservivel.create');
        Route::get('/show/{id}', [InservivelController::class, 'show'])->name('inservivel.show');
        Route::get('/create/pesquisa', [InservivelController::class, 'pesquisa'])->name('inservivel.pesquisa');
        Route::post('/store', [InservivelController::class, 'store'])->name('inservivel.store');
    });
    Route::prefix('/historico')->group(function(){
        Route::get('/index', [HistoricoController::class, 'index'])->name('historico.index');
        Route::get('show/{id}', [HistoricoController::class, 'show'])->name('historico.show');
        Route::get('/pdf/{id}', [HistoricoController::class, 'pdf'])->name('historico.pdf');
        Route::delete('/destroy/{id}', [HistoricoController::class, 'destroy'])->name('historico.destroy');
        Route::get('/pesquisa', [HistoricoController::class, 'pesquisa'])->name('historico.pesquisa');

    });
});
