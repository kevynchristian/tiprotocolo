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
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Atendimentos Internos</h6>
        </div>
        <div class="col-4 ms-4">
          <div class="mb-3 mt-3">
            <button data-bs-toggle="modal" data-bs-target="#filtro" class="btn btn-outline-primary">Filtros</button>
        </div>
        </div>
        <div class="col-10 mx-auto text-center">
          <div style="display: none" id="alert" class="alert alert-success" role="alert">
              <strong id="msg"></strong>
          </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div id="tabela" class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ORD</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">SETOR</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">TÉCNICO</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">DATA</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($atendimentos as $atendimento)
                    
                    <tr id="atendimento-{{$atendimento->id}}">
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div>
                                    {{$atendimento->id}}
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">{{$atendimento->setorModel->setor}}</p>
                            
                        </td>
                        <td class="align-middle text-center text-sm">
                            <span class="badge badge-sm bg-gradient-success">{{$atendimento->funcionarioModel->nome}}</span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{date('d/m/Y', strtotime($atendimento->created_at))}}</span>
                        </td>
                        <td class="align-middle">
                            <button onclick="visualizar({{$atendimento->id}})" class="badge text-bg-primary"
                            data-bs-toggle="modal" data-bs-target="#visualizar"
                                ><i class="bi bi-tv"></i></button>
                            <a href="{{route('interno.edit', $atendimento->id)}}"><button type="button"
                                class="badge text-bg-secondary"><i class="bi bi-pen"></i></button></a>
                            <button onclick="exibirId({{$atendimento->id}})"  data-bs-target="#excluirAtendimento"
                                data-bs-toggle="modal" data-bs-target="#excluirModal" type="button"
                                class="badge text-bg-danger"><i class="bi bi-trash3"></i></button>
                        </td>
                    </tr>
                @endforeach
               
              </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<script src="{{asset('/assets/js/jquery.js')}}"></script>
<script src="{{asset('/assets/js/atendimento-interno/index.js')}}"></script>
{{$atendimentos->links()}}
</div>


<!-- Modal -->
<div class="modal fade" id="visualizar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Dados do atendimento</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <strong>Técnico: <span id="tecnico"></span> </strong><br><br>
            <strong>Setor: <span id="setor"></span> </strong><br><br>
            <strong>Data: <span id="data"></span> </strong><br><br>
            <div class="form-floating mb-3">
                <input id="problema" disabled type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Problema:</label>
            </div><br>
            
            <div class="form-floating mb-3">
                <input id="solucao" disabled type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Solução:</label>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
</div>


  <div class="modal fade" id="excluirAtendimento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir atendimento interno</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="atedimento-id">
            <strong>  Tem certeza que deseja excluir esse atendimento interno?</strong>
             
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button id="excluir" type="button" class="btn btn-danger">Excluir</button>
        </div>
      </div>
    </div>
  </div>



  <div class="modal fade" id="filtro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Filtros</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="atedimento-id">
          <div class="col-10 mb-3">
              <select id="setorFiltro" class="form-select" aria-label="Default select example">
                <option selected>Selecione um setor</option>
                @foreach ($setores as $setor)
                <option value="{{$setor->id_setor}}">{{$setor->setor}}</option>
                @endforeach
                <option value="0">Todos</option>
              </select>
          </div>
          <div class="col-10">

              <select id="ano" class="form-select" aria-label="Default select example">
                <option selected>Selecione um ano</option>
                <option value="2023">2023</option>
                <option value="2022">2022</option>
                <option value="2021">2021</option>
                <option value="2020">2020</option>
                <option value="2019">2019</option>
                <option value="2018">2018</option>
                <option value="0 ">Todos</option>
              </select>
          </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button id="filtrar" type="button" class="btn btn-warning">Filtrar</button>
        </div>
      </div>
    </div>
  </div>
  @endsection
  