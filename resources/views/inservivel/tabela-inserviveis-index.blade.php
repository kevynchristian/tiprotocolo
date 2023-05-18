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
                    <button data-bs-toggle="modal" data-bs-target="#modalView" class="btn btn-warning" title="Ver" onclick="visualizar({{$inservivel->id_protocolo_tombamento }})">
                        <i class="fa fa-television"></i>
                    </button>
                    <button class="btn btn-primary" title="Imprimir" onclick="gerarLaudo({{$inservivel->id}})"> 
                        <i class="fa fa-file-text-o"></i>
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

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
                  
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
<script src="{{ URL::asset('assets/js/jquery.js') }}"></script>
<script src="{{ URL::asset('assets/js/inservivel/index.js') }}"></script>
