<?php

namespace App\Http\Controllers;

use App\Models\Funcao;
use App\Models\Funcionario;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $funcionarios = Funcionario::all();
        // dd('a');
        return view('user.index', compact('funcionarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $funcoes = Funcao::all();
        $tipos = Role::all();
        return view('user.create', compact('funcoes', 'tipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $senha = '$2a$12$n7fLncjyhEg.pdchlD11wOtOCiohWohA8UZmjKhoUuhUCyWEOBrey';
            $funcionario = Funcionario::create([
                'nome' => $request->nome,
                'funcao' => $request->funcao,
                'ativo' => 1,
            ]);
            $user = User::create([
                'name' => $request->usuario,
                'email' => $request->email,
                'funcionario' => $funcionario->id,
                'password' => $senha
            ]);
            RoleUser::create([
                'user_id' => $user->id,
                'role_id' => $request->tipo
            ]);
            return 1;
        } catch (Exception $e) {
            return 0;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $funcoes = Funcao::all();
        $user = User::where('funcionario', $id)->first();
        $roles = Role::all();
        return view('user.edit', compact('user', 'roles', 'funcoes'));
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
    public function update(Request $request, string $id){
        try {

            $user = User::find($id);
            if ($request->email == $user->email) {
                $user->update([
                    'name' => $request->usuario,
                ]);
                $user->funcionarioModel->update([
                    'nome' => $request->nome,
                    'funcao' => $request->funcao,
                    'ativo' => $request->situacao
                ]);
                $user->rolesModel->update([
                    'role_id' => $request->tipo
                ]);
                return 1;
            } else {

                $user->update([
                    'name' => $request->usuario,
                    'email' => $request->email,
                ]);
                $user->funcionarioModel->update([
                    'nome' => $request->nome,
                    'funcao' => $request->funcao,
                    'ativo' => $request->situacao
                ]);
                $user->rolesModel->update([
                    'role_id' => $request->tipo
                ]);
                return 1;
            }
        } catch (Exception $ex) {
            return 0;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function login()
    {
        return view('user.login');

    }
    public function storeLogin(Request $request)
    {
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('msg', 'Dados incorretos!');
        }
    }
    public function logout($id)
    {
        Auth::logout($id);
        return redirect()->route('login');
    }
    public function teste($id)
    {
        $user = User::where('id', $id)->roleTeste()->first();

        dd($user);
    }
}
