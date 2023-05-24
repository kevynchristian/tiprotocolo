@extends('layout.template')
@section('content')
@section('title')
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Atendimento Interno / Editar</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Atendimento Interno</h6>
@endsection
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Editar atendimentos internos</h6>
        </div>
        <div class="col-7 mx-auto text-center">
            @if (session()->has('msgSuccess'))
            <div class="alert alert-success" role="alert">
                {{session('msgSuccess')}}                
            </div>
            @elseif(session()->has('msgError'))
            <div class="alert alert-danger" role="alert">
                {{session('msgError')}}                
            </div>
            @endif
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="col-6 mx-auto">
            <form action="{{route('interno.update', $atendimentoPorId->id)}}" method="POST">
                @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Técnico:</label>
                <select name="funcionario" class="form-select" aria-label="Default select example">
                        <option value="{{$atendimentoPorId->funcionarioModel->id}}" selected>{{$atendimentoPorId->funcionarioModel->nome}}</option>
                    @foreach ($tecnicos as $tecnico)
                        <option value="{{$tecnico->id}}">{{$tecnico->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Setor:</label>
                <select name="setor" class="form-select" aria-label="Default select example">
                        <option value="{{$atendimentoPorId->setorModel->id_setor}}" selected>{{$atendimentoPorId->setorModel->setor}}</option>
                    @foreach ($setores as $setor)
                        <option value="{{$setor->id_setor}}">{{$setor->setor}}</option>
                    @endforeach
                </select>
            </div>
              <div class="mb-3">
                  <label for="exampleInputtext1" class="form-label">Data:  {{date('d/m/Y', strtotime($atendimentoPorId->created_at))}}</label>
                  <input required name="data" type="date" class="form-control" id="exampleInputtext1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Problema</label>
                    <input name="problema" value="{{$atendimentoPorId->problema}}" type="text" class="form-control" id="exampleInputtext1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Solução:</label>
                    <input name="solucao" value="{{$atendimentoPorId->solucao}}" type="text" class="form-control" id="exampleInputtext1">
                </div>
                <div>
                    <input type="submit" class="btn btn-primary" value="Editar">
                </div>
            </form>
            </div>
        </div>
@endsection
        