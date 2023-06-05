<?php

namespace App\Http\Controllers;

use App\Models\AtendimentoEscola;
use App\Models\Escola;
use App\Models\Funcionario;
use App\Models\Problema;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\all;
use function PHPSTORM_META\map;

class AtendimentoEscolasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $funcionarios = Funcionario::whereIn('funcao', [2, 4, 5])->where(['ativo' => 1])
            ->orderBy('nome', 'asc')
            ->get();
        $escolas = Escola::orderBy('escola', 'asc')->get();
        return view('atendimento-escola.index', compact('escolas', 'funcionarios'));
    }

    public function events()
    {
        $data = array();
        $atendimentos = AtendimentoEscola::all();
        for ($i = 0; $i < $atendimentos->count(); $i++) {
            $data[$i] = array(
                "title" => $atendimentos[$i]->titulo,
                "start" => $atendimentos[$i]->inicio,
                "end" => $atendimentos[$i]->fim,
                "backgroundColor" => $atendimentos[$i]->cor,
                "allDay" => $atendimentos[$i]->todo_o_dia,
                "id" => $atendimentos[$i]->id,
            );
        }
        return json_encode($data);
        return $data;
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
        try {
            $escola = Escola::find($request->escola);
            $atendimento = AtendimentoEscola::create([
                'prioridade' => 0,
                'finalizado' => 0,
                'inicio' => $request->data,
                'cor' => null,
                'titulo' => $escola->escola,
                'funcionario_abriu' => Auth::user()->id,
                'funcionario_fez' => 0,
                'escola' => $request->escola,
                'solucao' => ''
            ]);
            for ($i = 0; $i < $request->lista; $i++) {
                Problema::create([
                    'feito' => 0,
                    'tomb_escola_id' => $atendimento->escola,
                    'evento_id' => $atendimento->id,
                    'desc' => $request->valorLista[$i],
                ]);
            }

            return 1;
        }catch(Exception $ex){
            return 0;
        }
    }

    /**
     * Display the specified resource.
     */
    public function finalizar(Request $request, $id)
    {
        AtendimentoEscola::find($id)->update(['finalizado' => 1, 'cor' => 'rgb(31,142,35)', 'funcionario_fez' => $request->tecnico, 'solucao' => $request->solucao]);
    }
    public function show(string $id)
    {
        $atendimento = AtendimentoEscola::with('problemaModel', 'escolaModel', 'funcionarioModel')->where('id', $id)->get();
        return [0 => $atendimento, 1 => 1];
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function addProblema(Request $request){
        $atendimento = AtendimentoEscola::find($request->id);
        
        Problema::create([
            'feito' => 0,
            'tomb_escola_id' => $atendimento->escola,
            'evento_id' => $atendimento->id,
            'desc' => $request->valorProblema, 
        ]);
    }
    public function update(Request $request, $id){
        try{
           $escola = Escola::find($request->escola);
           $atendimento = AtendimentoEscola::find($id);
           $atendimento->update(['titulo' => $escola->escola,'escola' => $request->escola, 'inicio' => $request->data]);
           return 1;
        }catch(Exception $ex){
            return 0;
        }
    }
    public function finalizarProblema(Request $request)
    {
        $arr = [];
        if (!empty($request->listagemProblema)) {
            for($i = 0; $i < count($request->listagemProblema); $i++){
             
                Problema::find($request->listagemProblema[$i])->update([
                    'feito' => 1,
                ]);
                array_push($arr, $request->listagemProblema[$i]);
            }
            return $arr;
    }
        
    }
    public function destroyProblema($id)
    {
        Problema::find($id)->delete();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $atendimento = AtendimentoEscola::with('problemaModel')->where('id', $id)->first();
        if(isset($atendimento)){
            foreach($atendimento->problemaModel as $problema){
                $problema->delete();
            }
            $atendimento->delete();
        }
        
        
    }
}
