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
