<?php

namespace App\Http\Controllers;

use App\Models\AtendimentoEscola;
use App\Models\AtendimentoInterno;
use App\Models\ProtocoloTombamento;
use Illuminate\Http\Request;

class GraficosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function anual(Request $request)
    {
        if (!empty($request->all())) {
            $anos = [];
            for ($i = 2017; $i <= date('Y'); $i++) {
                $anos[] = $i;
            }
            $consertos = [];
            $internos = [];
            $escolas = [];
            for ($datas = 0; $datas <= 12; $datas++) {
                $consertos[] = ProtocoloTombamento::where('status', 4)->whereMonth('created_at', $datas)->whereYear('created_at', $request->ano)->count();
                $escolas[] = AtendimentoEscola::whereMonth('created_at', $datas)->whereYear('created_at', $request->ano)->count();
                $internos[] = AtendimentoInterno::whereMonth('created_at', $datas)->whereYear('created_at', $request->ano)->count();
            }
            $newArrayConsertos = implode(',', $consertos);
            $newArrayEscolas = implode(',', $escolas);
            $newArrayInterno = implode(',', $internos);
            return view('graficos.anual', compact('newArrayConsertos', 'newArrayEscolas', 'newArrayInterno', 'anos'));
        } else {
            $anos = [];
            for ($i = 2017; $i <= date('Y'); $i++) {
                $anos[] = $i;
            }
    
            $consertos = [];
            $internos = [];
            $escolas = [];
            for ($datas = 0; $datas <= 12; $datas++) {
                $consertos[] = ProtocoloTombamento::where('status', 4)->whereMonth('created_at', $datas)->whereYear('created_at', 2023)->count();
                $escolas[] = AtendimentoEscola::whereMonth('created_at', $datas)->whereYear('created_at', 2023)->count();
                $internos[] = AtendimentoInterno::whereMonth('created_at', $datas)->whereYear('created_at', 2023)->count();
            }
            $newArrayConsertos = implode(',', $consertos);
            $newArrayEscolas = implode(',', $escolas);
            $newArrayInterno = implode(',', $internos);
            return view('graficos.anual', compact('newArrayConsertos', 'newArrayEscolas', 'newArrayInterno', 'anos'));
        }

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
        dd($request->all());
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
