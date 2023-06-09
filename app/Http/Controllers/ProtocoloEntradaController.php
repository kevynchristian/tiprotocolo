<?php

namespace App\Http\Controllers;

use App\Models\Escola;
use App\Models\Local;
use App\Models\Protocolo;
use App\Models\ProtocoloTombamento;
use App\Models\Setor;
use App\Models\TipoDeEquipamento;
use Exception;
use Illuminate\Contracts\Pagination\Paginator as PaginationPaginator;
use Illuminate\Http\Request;
use Illuminate\Pagination\PaginationState;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProtocoloEntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $protocolos = Protocolo::whereYear('created_at', 2023)->orderBy('created_at', 'desc')->simplePaginate(7);
        return view('protocolo-entrada.index', compact('protocolos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

            $tipos = TipoDeEquipamento::all();
            $locais = Local::all();
            $setorInterno = Setor::orderBy('setor', 'asc')->get();
            $escolas = Escola::orderBy('escola', 'asc')->get();
            return view('protocolo-entrada.create', compact('escolas', 'setorInterno', 'tipos', 'locais'));
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $origem = $request->origem;
        try {
            if ($origem = 91) {
                $protocolos = Protocolo::create([
                    'escola' => $request->origem,
                    'setor_interno' => $request->setor,
                    'data' => $request->data,
                    'usuario' => 0
                ]);
                return [0 => 1, 1 => $protocolos->id];
            } else {
                $protocolos = Protocolo::create([
                    'escola' => $request->origem,
                    'setor_interno' => 0,
                    'data' => $request->data,
                    'usuario' => 0
                ]);
                return [0 => 1, 1 => $protocolos->id];
            }
        } catch (Exception $ex) {
            return 0;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $protocolos = ProtocoloTombamento::with('protocoloModel')->where('id_protocolo', $id)->get();
        return view('protocolo-entrada.modal-index', compact('protocolos'));
    }

    public function mudaAno(Request $request)
    {
       if($request->ano == 0){
            $protocolos = Protocolo::orderBy('created_at', 'desc')->get();
            return view('protocolo-entrada.tabela-equipamento-index', compact('protocolos'));
       }
            $protocolos = Protocolo::orderBy('created_at', 'desc')->whereYear('created_at', $request->ano)->get();
            return view('protocolo-entrada.tabela-equipamento-index', compact('protocolos'));

    }
    public function pesquisa(Request $request)
    {
        $protocolos = Protocolo::where('id', 'like', '%' . $request->pesquisa . '%')->get();
        return view('protocolo-entrada.tabela-equipamento-index', compact('protocolos'));

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
    public function destroy(Request $request, $id)
    {
        try {
            $protocolo = Protocolo::find($id)->delete();
            $equipamentos = ProtocoloTombamento::where('id_protocolo', $id)->delete();
            return 1;
        }catch(Exception $ex){
            return 0;
        }
    }
}
