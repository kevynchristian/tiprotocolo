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
                <h4 class="mt-3 text-center">Criar novo usuário  </h4>
                <div id="div-msg" style="display: none" id="success" class="col-4 mb-3 mx-auto p-2">
                    <div id="alert-msg" class="alert alert-success text-center" role="alert">
                        <strong id="text-msg"> Protocolo cadastrado com sucesso!</strong>
                      </div>
                </div>
                <div style="display: none"  id="error" class="col-4 mb-3 mx-auto p-2">
                    <div class="alert alert-danger text-center" role="alert">
                        <strong id="msg"></strong>
                      </div>
                </div>
                <div class="container off-set">
                    <div class="row align-items-center">

                        <div class="col-4 mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nome:</label>
                            <input id="nome" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">        
                            
                        </div>
                        <div class="col-4 mb-3">
                            <label for="exampleInputEmail1" class="form-label">Usuário:</label>
                            <input id="usuario" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">        
                            
                        </div>
                        <div class="col-4 mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email:</label>
                            <input id="email" required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">        
                            
                        </div>
                        <div class="col-6 mb-3">
                            <label for="exampleInputEmail1" class="form-label">Função:</label>
                            <select id="funcao" class="form-select" aria-label="Default select example">
                                <option selected>Selecione uma função</option>
                                @foreach ($funcoes as $funcao )
                                    <option value="{{$funcao->id}}">{{$funcao->desc}}</option>
                                @endforeach
                              </select>
                        </div>

                        <div class="col-6 mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tipo de usuário:</label>
                            <select id="tipo" class="form-select" aria-label="Default select example">
                                <option selected>Selecione um tipo de usuário</option>
                                @foreach ($tipos as $tipo)
                                    
                                <option value="{{$tipo->id}}">{{$tipo->label}}</option>
                                @endforeach
                                
                              </select>
                            
                        </div>
                        <div class="col-12 mb-3 d-flex justify-content-end">
                            <button id="cadastrar" class="btn btn-primary">Cadastrar</button>
                        </div>


                    </div>
                </div>
            
            </div>
        </div>
    </div>
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="{{asset('assets/js/usuario/create.js')}}"></script>
@endsection