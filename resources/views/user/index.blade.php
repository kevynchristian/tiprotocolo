@extends('layout.template')
@section('content')
@section('title')
<li class="breadcrumb-item text-sm text-white active" aria-current="page">Usuários</li>
</ol>
<h6 class="font-weight-bolder text-white mb-0">Usuários</h6>
@endsection
<input type="hidden" id="_token" value="{{ csrf_token() }}">
    <div class="card mb-4 card-1">
        <div class="container text-center">
            <div class="row">
                @foreach ($funcionarios as $funcionario)
                    <div class="col-md-4 mt-4">
                        <div class="card-body pt-4 p-3">
                            <ul class="list-group">
                              <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                  <h5 class="mb-3 text-sm">{{$funcionario->nome}}</h5>
                                  <span class="mb-2 text-xs">Atendimentos Internos: <span class="text-dark font-weight-bold ms-sm-2">{{count($funcionario->atendimentosInternosModel)}}</span></span>
                                  <span class="mb-2 text-xs">Atendimentos a escolas: <span class="text-dark ms-sm-2 font-weight-bold">{{count($funcionario->atendimentosEscolasModel)}}</span></span>
                                  <span class="text-xs">Consertos em máquinas: <span class="text-dark ms-sm-2 font-weight-bold">{{count($funcionario->protocoloTombamentoModel)}}</span></span>
                                </div>
                                <div class="ms-auto text-end">
                                  <a class="btn btn-link text-dark px-3 mb-0" href="{{route('user.show', $funcionario->id)}}">
                                    <i class="bi bi-person-circle"></i><br> Perfil</a>
                                </div>
                              </li>
                           
                            </ul>
                          </div>
                    </div>
              @endforeach
             
              
            </div>
          </div>
    </div>
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="{{asset('assets/js/usuario/index.js')}}"></script>
@endsection