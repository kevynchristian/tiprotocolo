@extends('layout.template')
@section('content')
@section('title')
<li class="breadcrumb-item text-sm text-white active" aria-current="page">Usuários</li>
</ol>
<h6 class="font-weight-bolder text-white mb-0">Usuários</h6>
@endsection
    
<input type="hidden" id="_token" value="{{ csrf_token() }}">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 card-1">
                <h4 class="mt-3 text-center">Editar usuário  </h4><br> 
            
                <div style="display: none"  id="error" class="col-4 mb-3 mx-auto p-2">
                    <div id="alert-msg" class="alert alert-danger text-center" role="alert">
                        <strong id="msg"></strong>
                      </div>
                </div>
                <div class="container off-set">
                    <div class="row align-items-center">

                        <div class="col-4 mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nome:</label>
                            <input disabled value="{{$user->funcionarioModel->nome}}" id="nome" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">        
                            
                        </div>
                        <div class="col-4 mb-3">
                            <label for="exampleInputEmail1" class="form-label">Usuário:</label>
                            <input disabled value="{{$user->name}}" id="usuario" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">        
                            
                        </div>
                        <div class="col-4 mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email:</label>
                            <input disabled value="{{$user->email}}" id="email" required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">        
                            
                        </div>
                        <div class="col-4 mb-3">
                            <label for="exampleInputEmail1" class="form-label">Função:</label>
                            <select disabled id="funcao" class="form-select" aria-label="Default select example">
                                <option value="0">Selecione uma Função</option>
                                @foreach($funcoes as $funcao)
                                @if( $user->funcionarioModel->funcaoModel->id == $funcao->id )
                                <option value="{{$funcao->id}}" selected>{{$funcao->desc}}</option>
                                @else
                                <option value="{{$funcao->id}}">{{$funcao->desc}}</option>
                                @endif
                                @endforeach
                                
                              </select>
                        </div>

                        <div class="col-4 mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tipo de usuário:</label>
                            <select disabled id="tipo" class="form-select" aria-label="Default select example">
                                <option value="0">Selecione um tipo de perfil</option>
                                @foreach($roles as $role)
                                    @if( $user->rolesModel->roleModel->id == $role->id )
                                    <option value="{{$role->id}}" selected>{{$role->label}}</option>
                                    @else
                                    <option value="{{$role->id}}">{{$role->label}}</option>
                                    @endif
                                @endforeach
                                
                              </select>
                            
                        </div>
                        <div class="col-4 mb-3">
                            <label for="exampleInputEmail1" class="form-label">Situação:</label>
                            <select id="situacao" disabled id="tipo" class="form-select" aria-label="Default select example">
                                @if( $user->funcionarioModel->ativo == 0)
                                <option value="0" selected>Inativo</option>
                                <option value="1">Ativo</option>
                                @else
                                <option value="0">Inativo</option>
                                <option value="1" selected>Ativo</option>
                                @endif
                              </select>
                            
                        </div>
                        <div class="col-12 mb-3 d-flex justify-content-end">
                            <button id="editar" class="btn btn-primary">Editar</button>
                            <button onclick="update({{Auth::user()->id}})" style="display: none" id="update" class="btn btn-primary">Editar</button>
                        </div>


                    </div>
                </div>
            
            </div>
        </div>
    </div>
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="{{asset('assets/js/usuario/index.js')}}"></script>
@endsection