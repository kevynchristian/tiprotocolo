@extends('layout.template')
@section('content')
@section('title')
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Escolas</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Escolas</h6>
@endsection
<input type="hidden" id="_token" value="{{csrf_token()}}">
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <h4 class="mt-3 text-center">Listagem de Escolas </h4>
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Opções</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($escolas as $escola)
                    
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$escola->escola}}</h6>
                      </div>
                    </div>
                  </td>
                 
                 
                 
                  <td class="align-middle">
                    <button class="btn btn-info" onclick="exibirID({{$escola->id}})" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="bi bi-pencil"></i>
                    </button>
                  </td>
                </tr>
                @endforeach
                
              </tbody>
            </table>
        </div>
    </div>
        
    </div>

</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Editar dados da escola </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container">
                <input type="hidden" id="id-escola" value="0">
                <div class="row">
                  <div class="col-4-md-4">
                        <label for="exampleInputEmail1" class="form-label">Nome:</label>
                        <input id="nome" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <label for="exampleInputEmail1" class="form-label">Email:</label>
                      <input id="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      
                      <label for="exampleInputEmail1" class="form-label">Telefone:</label>
                      <input id="telefone" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    
                  </div>
                  
                </div>
               
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button onclick="editar()" type="button" class="btn btn-primary">Editar</button>
        </div>
      </div>
    </div>
  </div>
    <script src="{{ asset('/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('/assets/js/escolas/index.js') }}"></script>
@endsection
