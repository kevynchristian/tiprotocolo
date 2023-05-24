 <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ORD</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">SETOR</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">TÉCNICO</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">DATA</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($atendimentos as $atendimento)
                    
                    <tr id="atendimento-{{$atendimento->id}}">
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div>
                                    {{$atendimento->id}}
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">{{$atendimento->setorModel->setor}}</p>
                            
                        </td>
                        <td class="align-middle text-center text-sm">
                            <span class="badge badge-sm bg-gradient-success">{{$atendimento->funcionarioModel->nome}}</span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{date('d/m/Y', strtotime($atendimento->created_at))}}</span>
                        </td>
                        <td class="align-middle">
                            <button onclick="visualizar({{$atendimento->id}})" class="badge text-bg-primary"
                            data-bs-toggle="modal" data-bs-target="#visualizar"
                                ><i class="bi bi-tv"></i></button>
                            <a href="{{route('interno.edit', $atendimento->id)}}"><button type="button"
                                class="badge text-bg-secondary"><i class="bi bi-pen"></i></button></a>
                            <button onclick="exibirId({{$atendimento->id}})"  data-bs-target="#excluirAtendimento"
                                data-bs-toggle="modal" data-bs-target="#excluirModal" type="button"
                                class="badge text-bg-danger"><i class="bi bi-trash3"></i></button>
                        </td>
                    </tr>
                @endforeach
               
              </tbody>
            </table>