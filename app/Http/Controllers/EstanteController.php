<?php

namespace App\Http\Controllers;

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
            $protocolos = ProtocoloTombamento::whereStatus($request->status)->whereYear('created_at', 2022)->orderBy('id', 'desc')->get();
            return view('estante.equipamentos', compact('protocolos'));
        } else {
            $protocolos = ProtocoloTombamento::whereStatus(1)->whereYear('created_at', 2023)->get();
            return view('estante.index', compact('protocolos'));
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function pesquisa(Request $request)
    {
        $protocolos = ProtocoloTombamento::where('tombamento', 'like', '%' . $request->tombamento . '%')->get();
        return view('estante.equipamentos', compact('protocolos'));
    }

    public function filtros(Request $request)
    {
        $protocolos = ProtocoloTombamento::whereStatus($request->status)->whereYear('created_at', $request->ano)->get();
        return view('estante.equipamentos', compact('protocolos'));
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
