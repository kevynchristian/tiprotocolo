<?php

namespace App\Http\Controllers;

use App\Models\AtendimentoEscola;
use App\Models\AtendimentoInterno;
use App\Models\Funcionario;
use App\Models\Inservivel;
use App\Models\ProtocoloTombamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraficosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function anual(Request $request)
    {
        $anoSelect = $request->ano;
        if (!empty($request->all())) {
            $anos = [];
            for ($i = 2017; $i <= date('Y'); $i++) {
                $anos[] = $i;
            }
            $consertos = [];
            $internos = [];
            $escolas = [];
            for ($datas = 0; $datas <= 12; $datas++) {
                $consertos[] = ProtocoloTombamento::where('status', 4)->whereMonth('created_at', $datas)->whereYear('created_at', $request->ano)->count();
                $escolas[] = AtendimentoEscola::whereMonth('created_at', $datas)->whereYear('created_at', $request->ano)->count();
                $internos[] = AtendimentoInterno::whereMonth('created_at', $datas)->whereYear('created_at', $request->ano)->count();
            }
            $newArrayConsertos = implode(',', $consertos);
            $newArrayEscolas = implode(',', $escolas);
            $newArrayInterno = implode(',', $internos);
            return view('graficos.tabelas-grafico', compact('newArrayConsertos', 'newArrayEscolas', 'newArrayInterno', 'anoSelect'));
        }
        $anos = [];
        for ($i = 2017; $i <= date('Y'); $i++) {
            $anos[] = $i;
        }

        $consertos = [];
        $internos = [];
        $escolas = [];
        for ($datas = 0; $datas <= 12; $datas++) {
            $consertos[] = ProtocoloTombamento::where('status', 4)->whereMonth('created_at', $datas)->whereYear('created_at', 2023)->count();
            $escolas[] = AtendimentoEscola::whereMonth('created_at', $datas)->whereYear('created_at', 2023)->count();
            $internos[] = AtendimentoInterno::whereMonth('created_at', $datas)->whereYear('created_at', 2023)->count();
        }
        $newArrayConsertos = implode(',', $consertos);
        $newArrayEscolas = implode(',', $escolas);
        $newArrayInterno = implode(',', $internos);
        return view('graficos.anual', compact('newArrayConsertos', 'newArrayEscolas', 'newArrayInterno', 'anos'));
    }
    public function participacoes(Request $request)
    {
        $anos = [];
        for ($i = 2017; $i <= date('Y'); $i++) {
            $anos[] = $i;
        }
        if (!empty($request->all())) {
            $ano = $request->ano;
            $funcionarios = Funcionario::withCount(['atendimentosInternosModel' => function ($query) use ($ano) {
                $query->whereYear('created_at', $ano);
            }, 'protocoloTombamentoModel' => function ($query) use ($ano) {
                $query->where('status', 4)->whereYear('created_at', $ano);
            }, 'atendimentosEscolasModel' => function ($query) use ($ano) {
                $query->whereYear('created_at', $ano);
            }])
                ->whereIn('funcao', [2, 4, 5, 6])
                ->where('ativo', 1)
                ->get();
            $arrayAtendimentoInterno = [];
            $arrayMaquinas = [];
            $arrayEscola = [];
            foreach ($funcionarios as $fun) {
                array_push($arrayAtendimentoInterno, $fun->atendimentos_internos_model_count);
                array_push($arrayMaquinas, $fun->protocolo_tombamento_model_count);
                array_push($arrayEscola, $fun->atendimentos_escolas_model_count);
            }
            $novoArrayInterno = implode(',', $arrayAtendimentoInterno);
            $novoArrayMaquinas = implode(',', $arrayMaquinas);
            $novoArrayEscolas = implode(',', $arrayEscola);
            return view('graficos.tabela-participacoes', compact('funcionarios', 'novoArrayInterno', 'novoArrayMaquinas', 'novoArrayEscolas', 'ano'));
        } else {



            $funcionarios = Funcionario::withCount(['atendimentosInternosModel' => function ($query) {
                $query->whereYear('created_at', 2023);
            }, 'protocoloTombamentoModel' => function ($query) {
                $query->where('status', 4)->whereYear('created_at', 2023);
            }, 'atendimentosEscolasModel' => function ($query) {
                $query->whereYear('created_at', 2023);
            }])
                ->whereIn('funcao', [2, 4, 5, 6])
                ->where('ativo', 1)
                ->get();
            $arrayAtendimentoInterno = [];
            $arrayMaquinas = [];
            $arrayEscola = [];
            foreach ($funcionarios as $fun) {
                array_push($arrayAtendimentoInterno, $fun->atendimentos_internos_model_count);
                array_push($arrayMaquinas, $fun->protocolo_tombamento_model_count);
                array_push($arrayEscola, $fun->atendimentos_escolas_model_count);
            }
            $novoArrayInterno = implode(',', $arrayAtendimentoInterno);
            $novoArrayMaquinas = implode(',', $arrayMaquinas);
            $novoArrayEscolas = implode(',', $arrayEscola);
            return view('graficos.participacoes', compact('anos', 'funcionarios', 'funcionarios', 'novoArrayInterno', 'novoArrayMaquinas', 'novoArrayEscolas'));
        }
    }
    public function inserviveis(Request $request)
    {
        $anos = [];
        for ($i = 2017; $i <= date('Y'); $i++) {
            array_push($anos, $i);
        }
        if (!empty($request->all())) {
            $ano = $request->ano;
            $inserviveis = [];
            for ($meses = 0; $meses <= 12; $meses++) {

                $inserviveis[] = Inservivel::whereMonth('created_at', $meses)
                    ->whereYear('created_at', $ano)
                    ->get()->count();
            }
            $newInserviveis = implode(',', $inserviveis);



            return view('graficos.tabela-inserviveis', compact('ano', 'newInserviveis'));
        }

        //ano atual

        $inserviveis = [];
        for ($meses = 0; $meses <= 12; $meses++) {

            $inserviveis[] = Inservivel::whereMonth('created_at', $meses)
                ->whereYear('created_at', date('Y'))
                ->get()->count();
        }
        $newInserviveis = implode(',', $inserviveis);



        return view('graficos.inserviveis', compact('anos', 'newInserviveis'));
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
        dd($request->all());
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
