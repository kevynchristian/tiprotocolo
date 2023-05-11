<?php

namespace App\Http\Controllers;

use App\Models\ProtocoloTombamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProtocoloTombamentoController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        ProtocoloTombamento::create([
            'id_protocolo' => $id,
            'prioridade' => $request->prioridade,
            'tombamento' => $request->tombamento,
            'tipo' => $request->tipo,
            'acessorios' => $request->acessorios,
            'local' => $request->local,
            'desc' => $request->desc,
            'status' => 1,
            'id_responsavel' => Auth::user()->id
        ]);
        $protocolos = ProtocoloTombamento::where('id_protocolo', $id)->get();
        return $protocolos;
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
