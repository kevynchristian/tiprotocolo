<?php

namespace App\Http\Controllers;

use App\Models\AtendimentoEscola;
use App\Models\AtendimentoInterno;
use App\Models\Inservivel;
use App\Models\ProtocoloTombamento;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $atendimentoEscola = AtendimentoEscola::all()->count();
        $atendimentoInterno = AtendimentoInterno::all()->count();
        $laudoInserviveis = Inservivel::all()->count();
        $atendimentoInternoMes = AtendimentoInterno::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
        $atendimentoEscolaMes = AtendimentoEscola::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
        $consertos = ProtocoloTombamento::where('status', 3)->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
        $protocolo = ProtocoloTombamento::where('status', 3)->count();
        $emAberto = ProtocoloTombamento::where('status', 1)->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
        $emAndamento = ProtocoloTombamento::where('status', 2)->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
        $concluido = ProtocoloTombamento::where('status', 3)->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
        $finalizado = ProtocoloTombamento::where('status', 4)->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
        $inservivelSemLaudo = ProtocoloTombamento::where('status', 5)->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
        $inservivelcomLaudo = ProtocoloTombamento::where('status', 6)->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
        $date = Carbon::parse(date('Y'))->locale('pt-BR');
        $mesAtual = $date->translatedFormat('F');
        return view('dashboard.dashboard', compact('atendimentoEscola', 'atendimentoInterno', 'laudoInserviveis', 'protocolo',
        'atendimentoInternoMes', 'atendimentoEscolaMes', 'consertos', 'emAberto', 'emAndamento', 'concluido', 'finalizado', 'inservivelSemLaudo', 'inservivelcomLaudo', 'mesAtual'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
