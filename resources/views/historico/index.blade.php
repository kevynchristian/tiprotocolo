@extends('layout.template')
@section('content')
@section('title')
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Histórico de
            Máquinas</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Histórico de Máquinas</h6>
@endsection
<input type="hidden" value="{{ csrf_token() }}" id="_token">
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Histórico de Máquinas</h6>
            </div>
            <div class="col-5 ms-3">
                <div class="mb-3">
                    <input type="text" placeholder="Pesquisa" class="form-control" id="pesquisa" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div id="tabela-maquinas" class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tombamento</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tipo</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data</th>
                        <th class="text-secondary opacity-7"></th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($maquinas as $maquina)

                    <input type="hidden" value="0" id="id-equipamento">
                        <tr id="maquina-{{$maquina->id}}">
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                        <img src="{{ asset('assets/img/'. $maquina->tipo .'.png') }}" class="avatar avatar-sm me-3" alt="user1">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{$maquina->tombamento}}</h6>
                            </div>
                          </div>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">{{$maquina->tipoModel->desc}}</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm bg-gradient-success">{{date('d/m/Y', strtotime($maquina->created_at))}}</span>
                        </td>
                        <td class="align-middle text-center">
                        </td>
                        <td class="align-middle">
                          <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                              <button onclick="visualizar({{$maquina->id}})" data-bs-toggle="modal" data-bs-target="#modalEquipamentos" class="btn btn-primary"><i class="bi bi-tv"></i></button>
                              <button onclick="pdf({{ $maquina->id }})" class="btn btn-info"><i class="bi bi-filetype-pdf"></i></button>
                              <button onclick="valorId({{ $maquina->id }})" data-bs-toggle="modal" data-bs-target="#modalExcluir"  class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                            </a>
                        </td>
                      </tr>
                      @endforeach




                    </tbody>
                  </table>
                </div>
              </div>


            </div>
           <span id="pagination"> {{ $maquinas->links() }}</span>
    </div>
</div>
<div class="modal fade" id="modalEquipamentos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Dados do Equipamento</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span id="statusModal" class="badge badge-sm bg-gradient-success"></span><br><br>
                <span>
                    <strong>Origem: </strong> <span id="origemModal"></span>
                </span>
                <span><br><br>
                    <strong>Data de entrada: </strong> <span id="dataModal"></span>
                </span><br><br>
                <span>
                    <strong>Tombamento: </strong> <span id="tombamentoModal"></span>
                </span><br><br>
                <span>
                    <strong>Problema: </strong> <span id="problemaModal"></span>
                </span><br><br>
                <span>
                    <strong>Status: </strong> <span id="situacaoModal"></span>
                </span><br><br>
                <span>
                    <div id="selecionarFuncionario" class="form-group">
                        <label for="exampleFormControlSelect1"><strong>Atribuir a um funcionário:</strong></label>
                        <select id="funcionario" class="form-control" id="exampleFormControlSelect1">
                            <option disabled selected>Selecione um funcionario</option>
                            @foreach ($funcionarios as $funcionario)
                                <option value="{{ $funcionario->id }}">{{ $funcionario->nome }}</option>
                            @endforeach
                        </select>
                    </div><br>
                </span>
                <span>
                    <label for="exampleFormControlSelect1"><strong>Solução:</strong></label>
                        <textarea id="solucao" class="form-control" placeholder="Solução" id="floatingTextarea2" style="height: 100px"></textarea>
                </span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

{{-- MODAL EXCLUIR --}}
<div class="modal fade" id="modalExcluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir atendimento </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <input id="protocolo-id" type="hidden" value="0">
            Tem certeza que deseja excluir o protocolo de atendimento?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button id="excluir" type="button" class="btn btn-danger" data-bs-dismiss="modal">Excluir</button>
        </div>
    </div>
</div>
<script src="{{URL::asset('assets/js/jquery.js')}}"></script>
<script src="{{URL::asset('assets/js/historico/index.js')}}"></script>
@endsection
