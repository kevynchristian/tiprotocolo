@extends('layout.template')
@section('content')
@section('title')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Estante</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Estante</h6>
@endsection
    <style>
        .back-btn {
            background-color: #024f9b;
        }
    </style>
    <input type="hidden" id="_token" value="{{ csrf_token() }}">
    <div class="row mb-5">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 mx-auto">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Em aberto - {{ date('Y') }}</p>
                    <h5 class="font-weight-bolder">

                    </h5>
                    <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder"></span>
                        {{ $aberto }}
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4  mx-auto">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Em andamento - {{ date('Y') }}</p>
                    <h5 class="font-weight-bolder">
                    </h5>
                    <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder"></span>
                        {{ $andamento }}
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4  mx-auto">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Saída - {{ date('Y') }}</p>
                    <h5 class="font-weight-bolder">
                    </h5>
                    <p class="mb-0">
                      <span class="text-danger text-sm font-weight-bolder"></span>
                        {{ $saida }}
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Estante de Equipamentos</h6>
                    <ul style="text-align: center" class="list-group list-group-horizontal active">
                        <button onclick="exibirPorStatus(1)" data-status="1" id="aberto" style="width: 500px"
                            class="list-group-item aberto btn-menu">Em aberto</button>
                        <button onclick="exibirPorStatus(2)" data-status="2" id="andamento" style="width: 500px"
                            class="list-group-item andamento btn-menu">Em andamento</button>
                        <button onclick="exibirPorStatus(3)" data-status="3" id="saida" style="width: 500px"
                            class="list-group-item saida btn-menu">Saída</button>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-sm-3 offset-md-1 mt-3">
                        {{-- PESQUISA --}}
                        <input id="pesquisa" type="text" class="form-control" placeholder="Pesquisa">

                    </div>
                    <div class="col-sm-3 mt-3">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#modalFiltros"
                            class="btn btn-outline-dark">Filtros <i class="bi bi-sliders"></i></button>
                    </div>

                </div>
                {{-- EQUIPAMENTOS --}}
                <div class="container" id="tabela-equipamentos">
                    <div class="row">
                        @foreach ($protocolos as $protocolo)
                            <div id="equipamento-{{$protocolo->id}}" class="col-md-4 text-center mt-5">
                                <img onclick="visualizarEquipamento({{ $protocolo->id }})" type="button"
                                    data-bs-toggle="modal" data-bs-target="#modalEquipamentos" style="width:100px"
                                    src="{{ URL::asset('assets/img/' . $protocolo->tipo . '.png') }}"><br>
                                @if ($protocolo->prioridade == 1)
                                    <span style="color: red"><strong>{{ $protocolo->tombamento }}</strong></span><br>
                                @else
                                    <span><strong>{{ $protocolo->tombamento }}</strong></span><br>
                                @endif
                                <span><strong>{{ date('d/m/Y', strtotime($protocolo->created_at)) }}</strong></span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Button trigger modal -->
    <div class="modal fade" id="modalFiltros" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Filtros</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-sm-6 mt-3">

                        {{-- ANO --}}
                        <div class="form-group">
                            <select class="form-control ano" id="exampleFormControlSelect1 ">
                                <option>Selecione o ano</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="0">Todos</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 mt-4">
                        {{-- STATUS --}}
                        <div class="form-group">
                            <select class="form-control status" id="exampleFormControlSelect1">
                                <option>Selecione o status</option>
                                <option value="1">Em aberto</option>
                                <option value="2">Em andamento</option>
                                <option value="3">Saída</option>
                                <option value="0">Todos</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button id="filtro" type="button" class="btn btn-primary">Filtrar</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="modalEquipamentos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                  <input type="hidden" id="pdf-id">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Dados do Equipamento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id-equipamento">
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
                        <div id="selecionarFuncionario" class="form-group">
                            <label for="exampleFormControlSelect1"><strong>Atribuir a um funcionário:</strong></label>
                            <select id="funcionario" class="form-control" id="exampleFormControlSelect1">
                                <option disabled selected>Selecione um funcionario</option>
                                @foreach ($funcionarios as $funcionario)
                                    <option value="{{ $funcionario->id }}">{{ $funcionario->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button id="btn-pdf" type="button" class="btn btn-secondary" data-bs-dismiss="modal">PDF</button>
                    <button data-status="2" id="btn-andamento" type="button" class="btn btn-primary">Andamento <i
                            class="bi bi-arrow-right"></i></button>
                    <button onclick="equipamentoParaEntrada()" data-status="1" id="btn-entrada" type="button"
                        class="btn btn-secondary">Entrada <i class="bi bi-arrow-left"></i></button>
                    <button data-status="3" id="btn-saida" type="button" class="btn btn-success">Saída <i
                            class="bi bi-arrow-right"></i></button>
                    <button data-status="5" id="btn-inservivel" type="button" class="btn btn-secondary">Inservivel
                        <i class="bi bi-arrow-down"></i></button>
                    <button data-status="4" id="btn-retirar" type="button" class="btn btn-success">Retirar <i
                            class="bi bi-arrow-up"></i></button>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed-plugin">
        <a href="{{route('protocolo.create')}}" class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="bi bi-plus-lg"></i>
        </a>
    </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('/assets/js/estante/index.js') }}"></script>
@endsection
