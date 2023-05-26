@extends('layout.template')
@section('content')
<link rel="stylesheet" href="{{asset('assets/datepicker/css/bootstrap-datepicker.css')}}">
<script src='{{asset('assets/fullcalendar/dist/index.global.js')}}'></script>
<script src='{{asset('assets/fullcalendar/packages/core/locales/pt.br.global.js')}}'></script>
<style>
  #calendar {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }
  
  #calendar {
    max-width: 1100px;
    margin: 0 auto;
    margin-top: 300px;
  }
  
  </style>
</head>
<body>
  <input type="hidden" id="_token" value="{{csrf_token()}}">
  <div id='calendar'></div>
  <!-- Modal - create -->
  <div class="modal fade" id="criar-evento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Criar evento</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
              <div class="col">
                  <strong>Escola: </strong>
                  <select id="escola" class="form-select" aria-label="Default select example">
                    <option selected>Selecione uma escola</option>
                    @foreach ($escolas as $escola)
                        <option value="{{$escola->id}}">{{$escola->escola}}</option>
                    @endforeach
                    
                  </select>
              </div>
          </div><br>
          <div class="row">
              <div class="col">
                <strong>Prioridade?</strong>
                <div class="form-check">
                    <input id="check-prioridade" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                    </label>
                  </div>
              </div>
          </div><br>
          <div class="row">
              <div class="col">
                <strong>Data:</strong>
                <input type="datetime-local" class="form-control" name="" id="data">
                
              </div>
          </div><br>
          <div class="row">
              <div class="col">
                  <strong>Problema:</strong>
                  <input id="problema" type="text" class="form-control"> 
              </div>
              <div class="col mt-4">
                  <button id="add-problema" class="btn btn-info"><i class="bi bi-plus-lg"></i></button>
              </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button id="criar" type="button" class="btn btn-primary">Criar</button>
      </div>
    </div>
  </div>
</div>

  <!-- Modal - index -->
  <div class="modal fade" id="ver-evento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <input type="hidden" name="" id="id-atendimento">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Criar evento</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
              <div class="col">
                  <strong>Escola: </strong>   
                  <select id="escola" class="form-select" aria-label="Default select example">
                  <option selected>Selecione uma escola</option>
                  @foreach ($escolas as $escola)
                      <option value="{{$escola->id}}">{{$escola->escola}}</option>
                  @endforeach
                  
                </select>
                  
              </div>
          </div><br>
          <div class="row">
            <div class="col">
              <strong>Técnico responsável: </strong>
              <select id="tecnico" class="form-select" aria-label="Default select example">
                <option selected>Selecione um funcionário</option>
                @foreach ($funcionarios as $funcionario)
                  <option value="{{$funcionario->id}}">{{$funcionario->nome}}</option>                
                    
                @endforeach
              </select>
            </div>
          </div><br>
          <div class="row">
              <div class="col">
                <strong>Prioridade?</strong>
                <div class="form-check">
                    <input id="check-prioridade" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                    </label>
                  </div>
              </div>
          </div><br>
          <div class="row">
              <div class="col">
                <strong>Data:</strong>
                <input type="datetime-local" class="form-control" name="" id="data2">
                
              </div>
          </div><br>
          <div class="row">
              <div class="col">
                  <strong>Problema:</strong>
                  <input id="problema" type="text" class="form-control">
              </div>
          </div><br>
          <div class="row">
              <div class="col">
                <div class="form-floating mb-3">
                  <strong>Descrição da Solução:</strong>
                  <input id="solucao" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-info">Excluir</button>
        <button id="finalizar" type="button" class="btn btn-success">Finalizar</button>
      </div>
    </div>
  </div>
</div>
  
  <script>
    $('#data').datepicker();
  </script>
<script src="{{asset('assets/datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.js')}}"></script>
<script src="{{asset('assets/js/full-calendar/index.js')}}"></script>
@endsection
