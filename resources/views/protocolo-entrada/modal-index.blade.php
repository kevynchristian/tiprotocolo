@if (!empty($protocolos))

    <table class="table align-items-center mb-0">
        <thead>
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tombamento
                </th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Entrada</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Funcionário</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Status</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Problema</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($protocolos as $protocolo)
                <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                            <div>

                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{ $protocolo->tombamento }}</h6>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">{{ date('d/m/Y', strtotime($protocolo->created_at)) }}
                        </p>
                    </td>

                    <td class="align-middle text-center text-sm">
                        @if ($protocolo->funcionarioModel != null)
                            <span
                                class="text-secondary text-xs font-weight-bold">{{ $protocolo->funcionarioModel->nome }}</span>
                        @else
                            <span class="text-secondary text-xs font-weight-bold">Sem funcionário responsável</span>
                        @endif
                    </td>
                    @if ($protocolo->status == 1)
                        <td class="align-middle text-center text-sm">
                            <button class="badge text-bg-warning">{{ $protocolo->statusModel->desc }}</button>
                        </td>
                    @elseif ($protocolo->status == 2)
                        <td class="align-middle text-center text-sm">
                            <button class="badge text-bg-primary">{{ $protocolo->statusModel->desc }}</button>
                        </td>
                    @elseif ($protocolo->status == 3 || $protocolo->status == 4)
                        <td class="align-middle text-center text-sm">
                            <button class="badge text-bg-success">{{ $protocolo->statusModel->desc }}</button>
                        </td>
                    @elseif ($protocolo->status == 5 || $protocolo->status == 5)
                        <td class="align-middle text-center text-sm">
                            <button class="badge text-bg-warning">{{ $protocolo->statusModel->desc }}</button>
                        </td>
                    @endif
                    <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold">{{ $protocolo->desc }}</span>
                    </td>
                </tr>
            @empty
                <span style="text-align:center"> Sem equipamentos cadastrados</span>
            @endforelse
        </tbody>
    </table>
@else
    <span style="text-align:center"> Sem equipamentos cadastrados</span>

@endif
