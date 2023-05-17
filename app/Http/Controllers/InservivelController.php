<?php

namespace App\Http\Controllers;

use App\Models\Equipamentos;
use App\Models\Inservivel;
use App\Models\ProtocoloTombamento;
use Illuminate\Http\Request;

class InservivelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $equipamentos = Equipamentos::orderBy('equipamento', 'asc')->get();
        $inserviveis = ProtocoloTombamento::where('status', 5)->orderBy('created_at', 'desc')->simplePaginate(7);
        return view('inservivel.create', compact('inserviveis', 'equipamentos'));
    }
    public function pesquisa(Request $request)
    {
        $inserviveis = ProtocoloTombamento::where('tombamento', 'like', '%'. $request->pesquisa . '%')->where('status', 5)->get();
        return view('inservivel.tabela-inserviveis', compact('inserviveis'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inserviveis = ProtocoloTombamento::find($request->id);
        $inserviveis->update(['status' => 6]);
        dd($inserviveis->protocoloModel->setor);
        if($inserviveis){
            // Inservivel::create([
            //     'id_protocolo_tombamento' => $request->id,
            //     'marca' => $request->marca,
            //     'modelo' => $request->modelo,
            //     'serie' => $request->serie,
            //     'tipo_problema' => $inserviveis->tipoModel->desc,
            //     'diretoria_id' => ,
            //     'setor' => $inserviveis->protocoloModel->setor->id_setor,
            //     'id_equipamento' => $request->equipamento
            // ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $inserviveis = ProtocoloTombamento::with('protocoloModel', 'funcionarioModel', 'tipoModel')->find($id);
        $inserviveis->protocoloModel = $inserviveis->protocoloModel->escolaModel->escola;
        return $inserviveis;
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
