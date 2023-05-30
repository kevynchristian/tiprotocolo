<?php

use App\Http\Controllers\AtendimentoEscolasController;
use App\Http\Controllers\AtendimentoInternoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EscolaController;
use App\Http\Controllers\EstanteController;
use App\Http\Controllers\GraficosController;
use App\Http\Controllers\HistoricoController;
use App\Http\Controllers\InservivelController;
use App\Http\Controllers\ProtocoloEntrada;
use App\Http\Controllers\ProtocoloEntradaController;
use App\Http\Controllers\ProtocoloTombamentoController;
use App\Http\Controllers\UserController;
use App\Models\AtendimentoEscola;
use App\Models\Inservivel;
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

Route::get('/', [UserController::class, 'login'])->name('login');
Route::post('/login/store', [UserController::class, 'storeLogin'])->name('login.store');
Route::get('/logout/{id}', [UserController::class, 'logout'])->name('logout');
//DASHBOARD
Route::middleware('autenticador')->group(function(){

    Route::prefix('/dashboard')->group(function(){
        Route::get('/index', [DashboardController::class, 'index'])->name('dashboard');
    });
    Route::prefix('/atendimento-escola')->group(function(){
        Route::get('/index', [AtendimentoEscolasController::class, 'index'])->name('atendimento-escola.index');
        Route::get('/events', [AtendimentoEscolasController::class, 'events'])->name('atendimento-escola.events');
        Route::get('/store', [AtendimentoEscolasController::class, 'store'])->name('atendimento-escola.store');
        Route::get('/show/{id}', [AtendimentoEscolasController::class, 'show'])->name('atendimento-escola.show');
        Route::post('/finalizar/{id}', [AtendimentoEscolasController::class, 'finalizar'])->name('atendimento-escola.finalizar');
        Route::delete('/destroy/{id}', [AtendimentoEscolasController::class, 'destroy'])->name('atendimento-escola.destroy');
        Route::get('/update', [AtendimentoEscolasController::class, 'update'])->name('atendimento-escola.update');
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
    Route::prefix('/atendimento-interno')->group(function(){
        Route::get('/create', [AtendimentoInternoController::class, 'create'])->name('interno.create');
        Route::post('/store', [AtendimentoInternoController::class, 'store'])->name('interno.store');
        Route::get('/index', [AtendimentoInternoController::class, 'index'])->name('interno.index');
        Route::get('/show/{id}', [AtendimentoInternoController::class, 'show'])->name('interno.show');
        Route::get('/edit/{id}', [AtendimentoInternoController::class, 'edit'])->name('interno.edit');
        Route::post('/update/{id}', [AtendimentoInternoController::class, 'update'])->name('interno.update');
        Route::delete('/destroy/{id}', [AtendimentoInternoController::class, 'destroy'])->name('interno.destroy');
        Route::get('/filtros', [AtendimentoInternoController::class, 'filtros'])->name('interno.filtros');
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
        Route::post('/devolver', [InservivelController::class, 'devolver'])->name('inservivel.devolver');
        Route::get('/create/pesquisa', [InservivelController::class, 'pesquisa'])->name('inservivel.pesquisa');
        Route::get('/index/pesquisa', [InservivelController::class, 'pesquisaIndex'])->name('inservivel.pesquisaIndex');
        Route::post('/store', [InservivelController::class, 'store'])->name('inservivel.store');
        Route::get('/pdf/{id}', [InservivelController::class, 'pdf'])->name('inservivel.pdf');
        Route::get('/index', [InservivelController::class, 'index'])->name('inservivel.index');
    });
    Route::prefix('/historico')->group(function(){
        Route::get('/index', [HistoricoController::class, 'index'])->name('historico.index');
        Route::get('show/{id}', [HistoricoController::class, 'show'])->name('historico.show');
        Route::get('/pdf/{id}', [HistoricoController::class, 'pdf'])->name('historico.pdf');
        Route::delete('/destroy/{id}', [HistoricoController::class, 'destroy'])->name('historico.destroy');
        Route::get('/pesquisa', [HistoricoController::class, 'pesquisa'])->name('historico.pesquisa');

    });
    Route::prefix('/usuarios')->group(function(){
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/index', [UserController::class, 'index'])->name('user.index');
        Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('user.update');
    });
    Route::prefix('/escolas')->group(function(){
        Route::get('/index', [EscolaController::class, 'index'])->name('escolas.index');
        Route::get('/show/{id}', [EscolaController::class, 'show'])->name('escolas.show');
        Route::post('/update', [EscolaController::class, 'update'])->name('escolas.update');
    });
    Route::prefix('/graficos')->group(function(){
        Route::get('/index', [GraficosController::class, 'index'])->name('graficos.index');
        Route::post('/store', [GraficosController::class, 'store'])->name('graficos.store');
    });
});
