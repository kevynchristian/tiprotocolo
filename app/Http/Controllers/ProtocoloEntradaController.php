<?php

namespace App\Http\Controllers;

use App\Models\Escola;
use App\Models\Protocolo;
use App\Models\Setor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProtocoloEntradaController extends Controller
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
        $setorInterno = Setor::orderBy('setor', 'asc')->get();
        $escolas = Escola::orderBy('escola', 'asc')->get();
        return view('protocolo-entrada.create', compact('escolas', 'setorInterno'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Protocolo::create([
            'escola' => $request->origem,
            'data' => $request->data,
            'usuario' => 0
        ]);
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