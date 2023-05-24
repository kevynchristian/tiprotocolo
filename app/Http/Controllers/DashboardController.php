<?php

namespace App\Http\Controllers;

use App\Models\AtendimentoEscola;
use App\Models\AtendimentoInterno;
use App\Models\Inservivel;
use App\Models\ProtocoloTombamento;
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
        return view('dashboard.dashboard', compact('atendimentoEscola', 'atendimentoInterno', 'laudoInserviveis', 'protocolo','atendimentoInternoMes', 'atendimentoEscolaMes', 'consertos'));
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
