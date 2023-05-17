@extends('layout.template')
@section('content')
@section('title')
    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Inservível</li>
    </ol>
    <h6 class="font-weight-bolder text-white mb-0">Inservível</h6>
@endsection
<input type="hidden" value="{{csrf_token()}}" name="" id="_token">
<div class="row">
    <div class="col-12">
        <div class="card mb-4 card-1">
            <h4 class="mt-3 text-center">Listagem de equipamentos com defeito </h4><br>
            <div class="col-5 ms-3">
                <div class="mb-3">
                    <input type="text" placeholder="Pesquisa" class="form-control" id="pesquisa"
                        aria-describedby="emailHelp">
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div id="tabela-inserviveis" class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Tombamento | NS</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Origem</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Data</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                </th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inserviveis as $inservivel)
                                <tr>
                                    <td>
                                        <input type="button" value="{{$inservivel->id}}" id="id-inservivel">
                                        <input type="button" id="setor_id" value="{{$inservivel->protocoloModel->setor->id_setor}}" >
                                        <input type="button" id="diretoria_id" value="{{$inservivel->protocoloModel->setor->diretoria_id}}" >
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{ asset('/assets/img/' . $inservivel->tipo . '.png') }}"
                                                    class="avatar avatar-sm me-3" alt="user1">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $inservivel->tombamento }}</h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    {{ $inservivel->tipoModel->desc }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">
                                            {{ $inservivel->protocoloModel->escolaModel->escola }}</p>
                                        @if ($inservivel->protocoloModel->setor_interno != 0)
                                            <p class="text-xs text-secondary mb-0">
                                                {{ $inservivel->protocoloModel->setor->setor }}</p>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span
                                            class="text-xs font-weight-bold mb-0">{{ date('d/m/Y', strtotime($inservivel->created_at)) }}</span>
                                    </td>

                                    <td class="align-middle">
                                        <button onclick="visualizar({{ $inservivel->id }})"
                                            id="visualizar" data-bs-toggle="modal" data-bs-target="#modalView"
                                            class="btn btn-primary"><i class="bi bi-tv"></i></button>
                                        <button id="laudo" onclick="visualizar({{ $inservivel->id }})" data-bs-toggle="modal" data-bs-target="#modalView"
                                            class="btn btn-info"><i class="bi bi-pencil-square"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <span id="paginacao">{{ $inserviveis->links() }}</span>
</div>


<div class="modal fade" id="modalView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Dados do Equipamento</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <span>
                        <strong>Origem: </strong><span id="origemModal"></span>
                    </span>
                    <span><br><br>
                        <strong>Funcionário responsável: </strong><span id="funcionarioModal"></span>
                    </span><br><br>
                    <span>
                        <strong>Tombamento: </strong><span id="tombamentoModal"></span>
                    </span><br><br>
                    <span>
                        <strong>Problema: </strong><span id="problemaModal"></span>
                    </span><br><br>
                    <span>
                        <strong>O que foi feito: </strong><span id="solucaoModal"></span>
                    </span><br><br>
                    <span>
                        <strong>Tipo: </strong> <span id="tipoModal"></span>
                    </span><br><br>
                    <span>
                        <strong>Data de entrada: </strong> <span id="dataModal"></span>
                    </span><br><br>
                    <div id="modal-2">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Problema:</label>
                            <select id="equipamento" class="form-select" aria-label="Default select example">
                                <option selected>Selecione o problema</option>
                                @foreach ($equipamentos as $equipamento)
                                    <option value="{{$equipamento->id}}">{{$equipamento->equipamento}}</option>
                                @endforeach
                              </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Marca</label>
                            <input required type="text" id="marca" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Modelo</label>
                            <input required type="text" id="modelo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Número de série:</label>
                            <input required type="email" id="n-serie" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div id="btn-criar">
                            <button type="button" class="btn btn-primary">Devolver</button>
                            <button id="gerar-laudo" type="button" class="btn btn-info">Gerar</button>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
</div>


        <script src="{{ URL::asset('assets/js/jquery.js') }}"></script>
        <script src="{{ URL::asset('assets/js/inservivel/create.js') }}"></script>

@endsection
