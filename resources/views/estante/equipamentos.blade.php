<div class="container">
    <div  class="row">
        @foreach ($protocolos as $protocolo)
            <div id="equipamento-{{$protocolo->id}}" class="col-md-4 text-center">
                <img onclick="visualizarEquipamento({{$protocolo->id}})"data-bs-toggle="modal" data-bs-target="#modalEquipamentos" style="width:100px" src="{{ URL::asset('assets/img/' . $protocolo->tipo . '.png') }}"><br>
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
                <button onclick="filtros()" id="filtro" type="button" class="btn btn-primary">Filtrar</button>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modalEquipamentos" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
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
                    <div id="div-solucao">
                        <label for="exampleFormControlSelect1"><strong>Solução: </strong></label>
                        <br>
                        <textarea id="solucao" class="form-control"  id="floatingTextarea"></textarea>
                    </div>
                </span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button onclick="equipamentoParaAndamento()" data-status="2" id="btn-andamento" type="button" class="btn btn-primary">Andamento <i
                        class="bi bi-arrow-right"></i></button>
                <button onclick="equipamentoParaEntrada()" data-status="1" id="btn-entrada" type="button" class="btn btn-secondary">Entrada <i
                        class="bi bi-arrow-left"></i></button>
                <button onclick="equipamentoParaSaida()" data-status="3" id="btn-saida" type="button" class="btn btn-success">Saída <i
                        class="bi bi-arrow-right"></i></button>
                <button onclick="equipamentoParaInservivel()" data-status="5" id="btn-inservivel" type="button" class="btn btn-secondary">Inservivel
                    <i class="bi bi-arrow-down"></i></button>
                <button onclick="equipamentoParaRetirada()" data-status="4" id="btn-retirar" type="button" class="btn btn-success">Retirar <i
                        class="bi bi-arrow-up"></i></button>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('/assets/js/jquery.js') }}"></script>
<script src="{{ asset('/assets/js/estante/equipamentos.js') }}"></script>
