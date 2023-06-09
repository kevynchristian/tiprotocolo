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
                    <button onclick="visualizar({{ $inservivel->id_protocolo }})"
                        data-bs-toggle="modal" data-bs-target="#modalView"
                        class="btn btn-primary"><i class="bi bi-tv"></i></button>
                    <button
                        class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalView"><i class="bi bi-pencil-square"></i></button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
