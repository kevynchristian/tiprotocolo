@extends('layout.template')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/datepicker/css/bootstrap-datepicker.css') }}">
    <script src='{{ asset('assets/fullcalendar/dist/index.global.js') }}'></script>
    <script src='{{ asset('assets/fullcalendar/packages/core/locales/pt.br.global.js') }}'></script>
    <style>
        #calendar {
            margin: 40px 10px;
            padding: 0;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 1100px;
            margin: 0 auto;
            margin-top: 300px;
        }
        .lista {
            background-color: rgb(252, 252, 252);
            color: white;
        }
        .bolinha-verde {
            background-color: rgb(20, 126, 20);
            border-radius: 50%;
            height: 10px;
            width: 10px;
            margin-left: 350px;
            position: relative;
            top: 15px
        }
       
    </style>
    </head>

    <body> 
        <div class="row">
            <div class="col text-center" >
                <h1 style="color: white">Atendimento as Escolas</h1>
            </div>
        </div>
        <input type="hidden" id="_token" value="{{ csrf_token() }}">
        <div id='calendar'></div>
        <!-- Modal - create -->
        <div class="modal fade" id="criar-evento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Criar evento</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <strong>Escola: </strong>
                                    <select id="escola" class="form-select" aria-label="Default select example">
                                        <option selected>Selecione uma escola</option>
                                        @foreach ($escolas as $escola)
                                            <option value="{{ $escola->id }}">{{ $escola->escola }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col">
                                    <strong>Prioridade?</strong>
                                    <div class="form-check">
                                        <input id="check-prioridade" class="form-check-input" type="radio"
                                            name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                        </label>
                                    </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col">
                                    <strong>Data:</strong>
                                    <input type="datetime-local" class="form-control" name="" id="data">

                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col">
                                    <strong>Problema:</strong>
                                    <input id="problema" type="text" class="form-control">
                                </div>
                                <div class="col mt-4">
                                    <button id="add-problema" class="btn btn-info"><i class="bi bi-plus-lg"></i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <ul id="lista-problema" class="list-group">
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button id="criar" type="button" class="btn btn-primary">Criar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal - index -->
        <div class="modal fade" id="ver-evento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            
            <input type="hidden" name="" id="id-atendimento">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Criar evento</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="erro" style="display: none" class="alert" role="alert">
                            <strong id="msg"></strong>
                          </div>
                          
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <strong>Escola: </strong>
                                    <select id="escola-modal" class="form-select" aria-label="Default select example">
                                        @foreach ($escolas as $escola)
                                            <option value="{{$escola->id }}">{{ $escola->escola }}</option>
                                        @endforeach

                                    </select>

                                </div>
                            </div><br>
                            
                            <div class="row">
                                <div class="col">
                                    <strong>Técnico responsável: <span id="text-tecnico"></span> </strong>
                                    <select id="tecnico" class="form-select" aria-label="Default select example">
                                        <option selected>Selecione um funcionário</option>
                                        @foreach ($funcionarios as $funcionario)
                                            <option value="{{ $funcionario->id }}">{{ $funcionario->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col">
                                    <strong>Data:</strong>
                                    <input type="datetime-local" class="form-control" name="" id="data2">

                                </div>
                            </div><br>
                            <div class="row">
                                <strong>Problemas:</strong>

                                <div class="col-3">
                                        <input id="problema-modal-2" type="text" class="form-control">
                                    </div>
                                    <div class="col-3">
                                        <button id="add-problema-modal-2" class="btn btn-info"><i class="bi bi-plus-lg"></i></button>
                                    </div>
                            </div>
                            <div class="row">
                                
                                    <ul id="problema-listagem" class="list-group">
                                        
                                    </ul>
                                    <button id="finalizar-problema" style="width: 200px" class="btn btn-warning mt-2">Finalizar Problema</button>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <strong>Descrição da Solução:</strong>
                                        <input id="solucao" type="text" class="form-control" id="floatingInput"
                                            placeholder="name@example.com">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button id="excluir" type="button" class="btn btn-info">Excluir</button>
                            <button id="salvar" type="button" class="btn btn-success">Salvar</button>
                            <button id="finalizar" type="button" class="btn btn-primary">Finalizar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       
        <script src="{{ asset('assets/js/jquery.js') }}"></script>
        <script src="{{ asset('assets/js/full-calendar/index.js') }}"></script>
    @endsection
