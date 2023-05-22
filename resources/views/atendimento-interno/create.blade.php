@extends('layout.template')
@section('content')
@section('title')
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Atendimento Interno</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Atendimento Interno</h6>
@endsection
<input type="hidden" id="_token" value="{{csrf_token()}}">
<div class="row">
  <div class="col-12">
      <div class="card mb-4 card-1">
          <h4 class="mt-3 text-center">Cadastrar Atendimento Interno  </h4>
          @if (session()->has('msg'))
            <div class="col-12 mb-3 mx-auto p-2">
              <div class="alert alert-success text-center" role="alert">
                <strong>{{session('msg')}}</strong>
              </div>
            </div>
          @endif
          <div  style="display: none" id="success" class="col-4 mb-3 mx-auto p-2">
              <div class="alert alert-success text-center" role="alert">
                  <strong> Protocolo cadastrado com sucesso!</strong>
                </div>
          </div>
          <div style="display: none"  id="error" class="col-4 mb-3 mx-auto p-2">
              <div class="alert alert-danger text-center" role="alert">
                  <strong id="msg"></strong>
                </div>
          </div>
          <div class="container off-set">
              <div class="row align-items-center">
                <form action="{{route('interno.store')}}" method="POST">
                  @csrf
                  <div class="col mb-3">
                      <label for="disabledTextInput" class="form-label">Técnico *</label>
                      <select name="funcionario" id="origem" class="form-select" aria-label="Default select example">
                          <option value="0" selected>Selecione um Técnico</option>
                        @foreach ($funcionarios as $funcionario)
                            <option value="{{$funcionario->id}}">{{$funcionario->nome}}</option>
                        @endforeach
                        </select>
                  </div>

                  <div id="setor" class="col-12 mb-3">
                      <label for="disabledTextInput" class="form-label">Setor:</label>
                      <select name="setor" id="selectSetor" class="form-select" aria-label="Default select example">
                        <option value="0" selected>Selecione um setor</option>
                        @foreach ($setores as $setor)
                            <option value="{{$setor->id_setor}}">{{$setor->setor}}</option>
                        @endforeach
                      </select>
                  </div>

                  <div class="col-12 mb-3">
                      <label for="disabledTextInput" class="form-label">Data:</label>
                      <input name="data" id="data" type="date" class="form-control">
                  </div>
                  <div class="col-12 mb-3">
                    <div class="form-floating">
                      <textarea name="problema" class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                      <label for="floatingTextarea">Problema</label>
                    </div>
                  </div>
                  <div class="col-12 mb-3">
                    <div class="form-floating">
                      <textarea name="solucao" class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                      <label  for="floatingTextarea">Solução</label>
                    </div>
                  </div>
                  <div class="col-12 mb-3 d-flex justify-content-end">
                      <button id="submit" class="btn btn-primary">Cadastrar</button>
                  </div>
                  </form>
              </div>
          </div>
          <div class="row" id="tabela-equipamentos" style="display: none;">
              <div class="form-group">
                  <br>
                  <div class="col-md-8 col-md-offset-2 mx-auto" id="equipamentos">

                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

@endsection
