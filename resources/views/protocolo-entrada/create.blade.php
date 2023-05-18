@extends('layout.template')
@section('content')
<input type="hidden" id="_token" value="{{ csrf_token() }}">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 card-1">
                <h4 class="mt-3 text-center">Cadastrar Protocolo de entrada de Equipamentos </h4>
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

                        <div class="col mb-3">
                            <label for="disabledTextInput" class="form-label">Origem:</label>
                            <select id="origem" class="form-select" aria-label="Default select example">
                                <option selected>Selecione uma escola | prédio</option>
                                @foreach ($escolas as $escola)
                                    <option value="{{$escola->id}}">{{ $escola->escola }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="setor" style="display: none" class="col-12 mb-3">
                            <label for="disabledTextInput" class="form-label">Setor:</label>
                            <select id="selectSetor" class="form-select" aria-label="Default select example">
                                <option value="0" selected>Selecione um setor interno</option>
                                @foreach ($setorInterno as $setor)
                                    <option value="{{ $setor->id_setor }}">{{ $setor->setor }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="disabledTextInput" class="form-label">Data:</label>
                            <input id="data" type="date" class="form-control">
                        </div>
                        <div class="col-12 mb-3 d-flex justify-content-end">
                            <button id="cadastrar" class="btn btn-primary">Cadastrar</button>
                        </div>
                        <div class="col-12 d-flex justify-content-end ">
                            <button style="display: none"  data-bs-toggle="modal" data-bs-target="#exampleModal" id="criar-equipamento" class="btn btn-success "><i class="bi bi-plus-lg"></i></button>

                            <button onclick="pdf()" style="display: none"  id="imprimir"class="btn btn-secondary ms-3"><i class="bi bi-filetype-pdf"></i></button>
                          </div>

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


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div id="msg-warning" style="display: none;" class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning">
                                <strong>Atenção!</strong> <span id="msg"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <i class="ion ion-clipboard"></i>
                                    <h5 class="box-title">ADICIONAR EQUIPAMENTO AO PROTOCOLO </h5>
                                    <input id="id-protocolo" type="hidden">
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Tombamento | NS</label>
                                            <input type="text" maxlength="20" id="tombamento" class="form-control">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Tipo do equipamento</label>
                                            <select id="tipo" class="form-control">
                                                <option value="0">Selecione o tipo do equipamento</option>
                                                @foreach($tipos as $tipo)
                                                <option value="{{$tipo->id}}">{{$tipo->desc}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <label for="">Acessórios?</label>
                                    <input type="checkbox" id="testando">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <textarea id="acessorios" class="form-control acessorios" rows="2"  style="resize: none;"></textarea>
                                        </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Local</label>
                                            <select id="local" class="form-control">
                                                <option value="0">Selecione o local do equipamento</option>
                                                @foreach($locais as $local)
                                                <option value="{{$local->id}}">{{$local->desc}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Prioridade ?</label>
                                            <input type="checkbox" id="prioridade">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Descrição do Problema</label>
                                            <textarea id="desc" class="form-control" rows="2" maxlength="100" style="resize: none;"></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="button" id="cadastrar-equipamento" class="btn btn-primary">Cadastrar <i class="fa fa-check-circle-o"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-right"  data-bs-dismiss="modal">Fechar <i class="fa fa-times"></i></button>
            </div>
            <!-- /.modal-content -->
        </div>
      </div>
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="{{asset('assets/js/protocolo-entrada/create.js')}}"></script>
@endsection
