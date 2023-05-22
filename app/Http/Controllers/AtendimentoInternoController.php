<?php

namespace App\Http\Controllers;

use App\Models\AtendimentoInterno;
use App\Models\Funcionario;
use App\Models\Setor;
use Illuminate\Http\Request;

class AtendimentoInternoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $funcionarios = Funcionario::orderBy('nome', 'asc')->where('ativo', 1)->whereIn('funcao', [2, 4, 5])->get();
        $setores = Setor::orderBy('setor', 'asc')->where('ativo', 1)->get();
        return view('atendimento-interno.create', compact('funcionarios', 'setores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $funcionario = $request->funcionario;
        $setor = $request->setor;
        $problema = $request->problema;
        $solucao = $request->solucao;

        AtendimentoInterno::create($request->all());
        return redirect()->back()->with('msg', 'Atedimento Interno cadastrado com sucesso!');
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
