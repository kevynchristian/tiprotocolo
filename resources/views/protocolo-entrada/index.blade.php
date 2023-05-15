@extends('layout.template')
@section('content')
@section('title')
    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Protocolos</li>
    </ol>
    <h6 class="font-weight-bolder text-white mb-0">Protocolos</h6>
@endsection
<input type="hidden" id="_token" value="{{ csrf_token() }}">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Protocolos</h6>
                </div>
                <div class="col-6 mx-auto p-2 text-center">
                    <div style="display: none" class="alert alert-success"  id="error" role="alert">
                        <span id="msg"></span>
                      </div>
                </div>
                <div class="container text-center">
                    <div class="row align-items-start">
                        <div class="col-4">
                          <select id="ano" class="form-select" aria-label="Default select example">
                              <option selected>Ano</option>
                              <option value="2023">2023</option>
                              <option value="2022">2022</option>
                              <option value="2021">2021</option>
                              <option value="2020">2020</option>
                              <option value="2019">2019</option>
                              <option value="2018">2018</option>
                              <option value="2017">2017</option>
                              <option value="0">Todos</option>
                            </select>
                      </div>
                      <div class="col-4">
                          <div class="mb-3">
                              <input id="pesquisa" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Pesquisa">
                          </div>
                      </div>
                    </div>
                  </div>

                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table id="tabela-equipamentos" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Protocolo
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Escola | Setor</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Data</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Opções</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($protocolos as $protocolo)
                                <tr id="protocolo-{{$protocolo->id}}">
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>

                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $protocolo->id }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        @if ($protocolo->setor_interno == 0)

                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $protocolo->escolaModel->escola }}
                                            </p>
                                        </td>
                                        @else
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $protocolo->escolaModel->escola }}
                                            </p>
                                            <p class="text-xs text-secondary mb-0">{{ $protocolo->setor->setor }}</p>
                                        </td>

                                        @endif
                                        <td class="align-middle text-center text-sm">
                                            <span
                                            class="text-secondary text-xs font-weight-bold">{{ date('d/m/Y', strtotime($protocolo->created_at)) }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <button onclick="visualizar({{ $protocolo->id }})" class="btn btn-primary"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal" type="button"
                                                class="btn btn-primary"><i class="bi bi-tv"></i></button>
                                                <button onclick="pdf({{ $protocolo->id }})" type="button" class="btn btn-secondary"><i
                                                    class="bi bi-filetype-pdf"></i></button>
                                                    <button onclick="exibirIdParaExcluir({{ $protocolo->id }})" data-bs-toggle="modal" data-bs-target="#excluirModal" type="button" class="btn btn-danger"><i
                                                        class="bi bi-trash3"></i></button>
                                                    </td>
                                                    <td class="align-middle">
                                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">VISUALIZAR REGISTROS DO PROTOCOLO</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div  class="d-flex justify-content-center align-items-center">
                        <div id="spinner" class="spinner-border text-primary" role="status">
                          <span class="visually-hidden">Carregando...</span>
                        </div>
                    </div>
                    <div id="tabela-modal" class="table-responsive p-0">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
   <span id="pagination"> {{$protocolos->links() }}</span>
    {{-- MODAL EXCLUIR --}}
    <div class="modal fade" id="excluirModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    </div>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/protocolo-entrada/index.js') }}"></script>
@endsection
