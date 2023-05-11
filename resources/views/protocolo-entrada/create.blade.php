@extends('layout.template')
@section('content')
<input type="hidden" id="_token" value="{{ csrf_token() }}">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <h4 class="mt-3 text-center">Cadastrar Protocolo de entrada de Equipamentos </h4>
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
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Selecione um setor interno</option>
                                @foreach ($setorInterno as $setor)
                                    <option value="">{{ $setor->setor }}</option>
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
                    </div>
                </div>


            </div>
        </div>
    </div>
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="{{asset('assets/js/protocolo-entrada/create.js')}}"></script>
@endsection
