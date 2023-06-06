<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\ProtocoloTombamento;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Enum;

class HistoricoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = DB::table('users')->select('id');
        dd($query);
        $maquinas = ProtocoloTombamento::whereIn('status', [4,6])->orderBy('created_at', 'desc')->cursorPaginate(10);
        $funcionarios = Funcionario::all();
        return view('historico.index', compact('maquinas', 'funcionarios'));
    }
    public function pdf($id)
    {
        $equipamentos = ProtocoloTombamento::with('protocoloModel')->find($id);
        $pdf = PDF::loadView('historico.pdf', compact('equipamentos'));
        return $pdf->stream();
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
    public function show($id)
    {
        $protocolo = ProtocoloTombamento::find($id);
        if (isset($protocolo)) {
            $protocolo->local = $protocolo->protocoloModel->escolaModel->escola;
            return $protocolo;
        }
    }
    public function pesquisa(Request $request)
    {
        $maquinas = ProtocoloTombamento::where('tombamento','like', '%'. $request->pesquisa . '%')->whereIn('status', [4,5,6])->get();
        return view('historico.table-equipamentos', compact('maquinas'));
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
    public function destroy($id)
    {
        ProtocoloTombamento::find($id)->delete();
    }
}
