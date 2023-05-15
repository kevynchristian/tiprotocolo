<?php

namespace App\Http\Controllers;

use App\Models\ProtocoloTombamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Exception;

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
        return view('protocolo-entrada.tabela-equipamentos', compact('protocolos'));
    }
    public function pdf($id)
    {
        try{
            $dados = ProtocoloTombamento::with('protocoloModel')->where('id_protocolo', $id)->first();
            $equipamentos = ProtocoloTombamento::with('protocoloModel')->where('id_protocolo', $id)->get();
            $pdf = PDF::loadView('protocolo-entrada.pdf', compact('equipamentos', 'dados'));
            return $pdf->stream();

        }catch(Exception $e){
            return 0;
        }
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

        try{
            $equipamento = ProtocoloTombamento::find($id)->delete();
            return 1;
        }catch(\Exception $e){
            return 0;

        }
    }
}
