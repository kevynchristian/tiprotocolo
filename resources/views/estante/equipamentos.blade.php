<div class="container">
    <div class="row">
        @foreach ($protocolos as $protocolo)
            <div class="col-md-4 text-center">
                <img onclick="visualizarEquipamento({{$protocolo->id}})" data-toggle="modal" data-target="#modalEquipamentos" style="width:100px" src="{{ URL::asset('assets/img/' . $protocolo->tipo . '.png') }}"><br>
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
<div class="modal fade" id="modalEquipamentos" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> Dados do Equipamento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <span>
                <strong>Origem: </strong> <span id="origemModal"></span>
            </span>
            <span><br>
                <strong>Data de entrada: </strong> <span id="dataModal"></span>
            </span><br>
            <span>
                <strong>Tombamento: </strong> <span id="tombamentoModal"></span>
            </span><br>
            <span>
                <strong>Problema: </strong> <span id="problemaModal"></span>
            </span><br>
            <span>
                <div class="form-group">
                    <label for="exampleFormControlSelect1"><strong>Atribuir a um funcionário:</strong></label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option disabled selected>Selecione um funcionario</option>
                        @foreach ($funcionarios as $funcionario)
                            <option>{{ $funcionario->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </span>
        </div>
        <div class="modal-footer">
            <button  type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button id="btn-andamento" type="button" class="btn btn-primary">Andamento  <i class="bi bi-arrow-right"></i></button>
            <button id="btn-entrada" type="button" class="btn btn-secondary">Entrada  <i class="bi bi-arrow-left"></i></button>
            <button id="btn-saida" type="button" class="btn btn-success">Saída  <i class="bi bi-arrow-right"></i></button>
            <button id="btn-inservivel" type="button" class="btn btn-secondary">Inservivel  <i class="bi bi-arrow-down"></i></button>
            <button id="btn-retirar" type="button" class="btn btn-success">Retirar   <i class="bi bi-arrow-up"></i></button>
        </div>
    </div>
</div>
</div>
<script src="{{ asset('/assets/js/jquery.js') }}"></script>
<script src="{{ asset('/assets/js/estante/index.js') }}"></script>
