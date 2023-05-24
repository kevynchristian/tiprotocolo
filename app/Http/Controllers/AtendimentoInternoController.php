<?php

namespace App\Http\Controllers;

use App\Models\AtendimentoInterno;
use App\Models\Funcionario;
use App\Models\Setor;
use Exception;
use Illuminate\Http\Request;

class AtendimentoInternoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setores = Setor::where('ativo', true)->orderBy('setor', 'asc')->get();
        $atendimentos = AtendimentoInterno::with('funcionarioModel')->whereYear('data', '2023')->orderBy('id', 'desc')->simplePaginate(5);
        return view('atendimento-interno.index', compact('atendimentos', 'setores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $funcionarios = Funcionario::orderBy('nome', 'asc')->where('ativo', 1)->whereIn('funcao', [2, 4, 5])->get();
        $setores = Setor::orderBy('setor', 'asc')->where('ativo', 1)->get();
        return view('atendimento-interno.create', compact('funcionarios', 'setores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $funcionario = $request->funcionario;
        $setor = $request->setor;
        $problema = $request->problema;
        $solucao = $request->solucao;

        AtendimentoInterno::create($request->all());
        return redirect()->back()->with('msg', 'Atedimento Interno cadastrado com sucesso!');   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $atendimento = AtendimentoInterno::find($id);
        $atendimento->funcionario = $atendimento->funcionarioModel->nome;
        $atendimento->setor = $atendimento->setorModel->setor;
        $atendimento->data = date('d/m/Y', strtotime($atendimento->data));
        return $atendimento;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $atendimentoPorId = AtendimentoInterno::find($id);
        $setores = Setor::where('ativo', true)->orderBy('setor', 'asc')->get();
        $tecnicos = Funcionario::whereIn('funcao', [2,4,5,6])->where('ativo', 1)->get();
        return view('atendimento-interno.edit', compact('atendimentoPorId', 'tecnicos', 'setores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $atendimento = AtendimentoInterno::find($id);
        try{
            $atendimento->update($request->all());
            return redirect()->back()->with('msgSuccess', 'Atendimento editado: '. $atendimento->id);
        }catch(Exception $ex){
            return redirect()->back()->with('msgError', 'Erro ao editar atendimento: '. $atendimento->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $atendimento = AtendimentoInterno::find($id);
        try{
            $atendimento->delete();
            $atendimento->error = 1;
            return $atendimento;
        }catch(Exception $ex){  
            $atendimento->error = 0;
            return $atendimento;
        }
    }
    
    public function filtros(Request $request){

        if($request->ano == 0){
            $atendimentos = AtendimentoInterno::whereSetor($request->setor)->orderBy('created_at', 'desc')->get();
            return view('atendimento-interno.table-atendimento', compact('atendimentos'));
        }
        if($request->setor == 0){
            $atendimentos = AtendimentoInterno::whereYear('created_at', $request->ano)->orderBy('created_at', 'desc')->get();
            return view('atendimento-interno.table-atendimento', compact('atendimentos'));
        }
        
        $atendimentos = AtendimentoInterno::whereYear('created_at', $request->ano)->orderBy('created_at', 'desc')->whereSetor($request->setor)->get();
        
        return view('atendimento-interno.table-atendimento', compact('atendimentos'));
    }
}
