<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Protocolo;
use App\Models\ProtocoloTombamento;
use Illuminate\Http\Request;

class EstanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $status = $request->id;
        if (!empty($request->status)) {
            $protocolos = ProtocoloTombamento::whereStatus($request->status)->whereYear('created_at', 2023)->orderBy('prioridade', 'desc')->get();
            $funcionarios = Funcionario::whereIn('funcao', [2, 4, 5])->where(['ativo' => 1])
                ->orderBy('nome', 'asc')
                ->get();
            return view('estante.equipamentos', compact('protocolos', 'funcionarios'));
        } else {
            $protocolos = ProtocoloTombamento::whereStatus(1)->whereYear('created_at', 2023)->orderBy('prioridade', 'desc')->get();
            $funcionarios = Funcionario::whereIn('funcao', [2, 4, 5])->where(['ativo' => 1])
                ->orderBy('nome', 'asc')
                ->get();
            return view('estante.index', compact('protocolos', 'funcionarios'));
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function pesquisa(Request $request)
    {
        $protocolos = ProtocoloTombamento::where('tombamento', 'like', '%' . $request->tombamento . '%')->whereIn('status', [1, 2, 3])->get();
        $funcionarios = Funcionario::whereIn('funcao', [2, 4, 5])->where(['ativo' => 1])
            ->orderBy('nome', 'asc')
            ->get();
        return view('estante.equipamentos', compact('protocolos', 'funcionarios'));
    }

    public function filtros(Request $request)
    {
        $protocolos = ProtocoloTombamento::whereStatus($request->status)->whereYear('created_at', $request->ano)->get();
        $funcionarios = Funcionario::whereIn('funcao', [2, 4, 5])->where(['ativo' => 1])
            ->orderBy('nome', 'asc')
            ->get();
        return view('estante.equipamentos', compact('protocolos', 'funcionarios'));
    }
    public function passar(Request $request)
    {
            $protocolo = ProtocoloTombamento::find($request->id);
        if($protocolo->status == 1){
            $protocolo->update(['status' => 2, 'id_responsavel' => $request->funcionario]);
        }
        elseif($protocolo->status == 2){
            $protocolo->update(['status' => 1, 'id_responsavel' => $request->funcionario]);
        }
        elseif($protocolo->status == 3){
            $protocolo->update(['status' => 3, 'id_responsavel' => $request->funcionario, 'soluca' => $request->solucao]);
        }

    }
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
    public function show($id)
    {
        $protocolo = ProtocoloTombamento::find($id);
        if (isset($protocolo)) {
            $protocolo->local = $protocolo->protocoloModel->escolaModel->escola;
            return $protocolo;
        }
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
