<?php

namespace App\Http\Controllers;

use App\Models\Equipamentos;
use App\Models\Inservivel;
use App\Models\ProtocoloTombamento;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Exception;
use Illuminate\Http\Request;

class InservivelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inserviveis = Inservivel::orderBy('created_at', 'desc')->simplePaginate(7);
        return view('inservivel.index', compact('inserviveis'));
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
    public function pesquisaIndex(Request $request)
    {
        $inserviveis = ProtocoloTombamento::where('tombamento', 'like', '%'. $request->pesquisa . '%')->where('status', 6)->get();
        return view('inservivel.tabela-inserviveis-index', compact('inserviveis'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{

            $inserviveis = ProtocoloTombamento::find($request->id);
            $inserviveis->update(['status' => 6]);
            if($inserviveis){
                $inseriu = Inservivel::create([
                    'id_protocolo_tombamento' => $inserviveis->id,
                    'marca' => $request->marca,
                    'modelo' => $request->modelo,
                    'serie' => $request->serie,
                    'tipo_problema' => 1,
                    'diretoria_id' => 0 ,
                    'setor_id' => 0,
                    'id_equipamento' => $request->equipamento
                ]);
                return $inserviveis->id;
            }
        }catch(Exception $ex){
            return $ex;
        }
            
    }
    public function pdf($id)
    {
        $newId = rtrim($id, ',_blank');
            $equipamentos = Inservivel::with('equipamentoModel')->where('id_protocolo_tombamento', $newId)->first();
            $pdf = PDF::loadView('inservivel.pdf', compact('equipamentos'));
            return $pdf->stream();
    
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $inserviveis = ProtocoloTombamento::with('protocoloModel', 'funcionarioModel', 'tipoModel')->find($id);
        $inserviveis->protocoloModel = $inserviveis->protocoloModel->escolaModel->escola;
        return $inserviveis;
    }

    public function devolver(Request $request)
    {
        try{
            $inservivel = ProtocoloTombamento::find($request->id);
            $inservivel->update(['status' => 1]);
            return [0 => $inservivel->id, 1 => 1];
        }catch(Exception $ex){
            return 0;
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
