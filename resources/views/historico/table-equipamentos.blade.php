<table class="table align-items-center mb-0">
    <thead>
      <tr>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tombamento</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tipo</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data</th>
        <th class="text-secondary opacity-7"></th>
        <th class="text-secondary opacity-7"></th>
    </tr>
</thead>
<tbody>
    @foreach ($maquinas as $maquina)

    <input type="hidden" value="0" id="id-equipamento">
        <tr id="maquina-{{$maquina->id}}">
            <td>
                <div class="d-flex px-2 py-1">
                    <div>
                        <img src="{{ asset('assets/img/'. $maquina->tipo .'.png') }}" class="avatar avatar-sm me-3" alt="user1">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$maquina->tombamento}}</h6>
            </div>
          </div>
        </td>
        <td>
            <p class="text-xs font-weight-bold mb-0">{{$maquina->tipoModel->desc}}</p>
        </td>
        <td class="align-middle text-center text-sm">
          <span class="badge badge-sm bg-gradient-success">{{date('d/m/Y', strtotime($maquina->created_at))}}</span>
        </td>
        <td class="align-middle text-center">
        </td>
        <td class="align-middle">
          <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
              <button onclick="visualizar({{$maquina->id}})" data-bs-toggle="modal" data-bs-target="#modalEquipamentos" class="btn btn-primary"><i class="bi bi-tv"></i></button>
              <button onclick="pdf({{ $maquina->id }})" class="btn btn-info"><i class="bi bi-filetype-pdf"></i></button>
              <button onclick="valorId({{ $maquina->id }})" data-bs-toggle="modal" data-bs-target="#modalExcluir"  class="btn btn-danger"><i class="bi bi-trash3"></i></button>
            </a>
        </td>
      </tr>
      @endforeach




    </tbody>
  </table>
