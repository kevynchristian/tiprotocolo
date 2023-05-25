@extends('layout.template')
@section('content')
<style>
    @keyframes animacao {
        from {width: 0px;}
        to {width: 400px}
    }

    .img-logo {
        animation-name: animacao;
        animation-duration: 5s;
        animation-iteration-count: 1;
    }

</style>
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Atendimento as Escolas</p>
                  <h5 class="font-weight-bolder">
                    {{$atendimentoEscola}}
                  </h5>
                  <p class="mb-0">
                    <span class="text-success text-sm font-weight-bolder"></span>

                  </p>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                  <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Atendimentos Internos</p>
                  <h5 class="font-weight-bolder">
                    {{$atendimentoInterno}}
                  </h5>
                  <p class="mb-0">
                    <span class="text-success text-sm font-weight-bolder"></span>

                  </p>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                  <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Laudos de Inservível</p>
                  <h5 class="font-weight-bolder">
                    {{$laudoInserviveis}}
                  </h5>
                  <p class="mb-0">
                    <span class="text-danger text-sm font-weight-bolder"></span>

                  </p>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                  <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Protocolos Finalizados</p>
                  <h5 class="font-weight-bolder">
                    {{$protocolo}}
                  </h5>
                  <p class="mb-0">
                    <span class="text-success text-sm font-weight-bolder"></span>
                  </p>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                  <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-lg-7 mb-lg-0 mb-4" style="height: 750px">
        <div class="card z-index-2 h-100">
          <div class="card-header pb-0 pt-3 bg-transparent">
            <h6 class="text-capitalize">Atividades do mês - {{$mesAtual}}</h6>
            <div class="col-12 mt-5">
                Atendimentos Internos: <strong>{{$atendimentoInternoMes}}</strong>
                  <div style="height: 20px" class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar" style="width: {{$atendimentoInternoMes}}%"></div>
                  </div><br>
                Atendimento as Escolas: <strong>{{$atendimentoEscolaMes}}</strong>
                <div style="height: 20px" class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                  <div  class="progress-bar" style="width: {{$atendimentoEscolaMes}}%"></div>
                </div><br>
                Conserto em equipamentos: <strong> {{$consertos}}</strong>
                <div style="height: 20px" class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                  <div class="progress-bar" style="width: {{$consertos}}%"></div>
                </div><br>

            </div>
            <div class="col-6 mx-auto mt-8">
                <img class="img-fluid img-logo" src="{{asset('assets/img/logo-seduc.jpeg')}}" alt="">
            </div>
          </div>
          <div class="card-body p-3">
            <div class="chart">
              <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="card card-carousel overflow-hidden h-100 p-0">
          <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
            <div class="carousel-inner border-radius-lg h-100">
              <div class="carousel-item h-100 active" >
                <div class="col mt-3 ms-4">
                 <strong class="text-capitalize"> Status das máquinas - {{$mesAtual}}</strong>
                </div>
                <div class="col-10 mt-5 ms-4">
                    Em aberto: <strong>{{$emAberto}}</strong>
                      <div style="height: 20px" class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                        <div id="progress-aberto" class="progress-bar" style="width: {{$emAberto}}%"></div>
                      </div><br>
                    Em andamento: <strong>{{ $emAndamento}}</strong>
                    <div style="height: 20px" class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                      <div  class="progress-bar" style="width: {{$emAndamento}}%"></div>
                    </div><br>
                    Concluído: <strong> {{$concluido}}</strong>
                    <div style="height: 20px" class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                      <div class="progress-bar" style="width: {{$concluido}}%"></div>
                    </div><br>
                    Finalizado: <strong>{{$finalizado}}</strong>
                      <div style="height: 20px" class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar" style="width: {{$finalizado}}%"></div>
                      </div><br>
                      Diagnosticado como inservível. Falta laudo técnico: <strong>{{$inservivelSemLaudo}}</strong>
                    <div style="height: 20px" class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                      <div  class="progress-bar" style="width: {{$inservivelSemLaudo}}%"></div>
                    </div><br>
                    Inservível. Laudo técnico já foi elaborado: <strong> {{$inservivelcomLaudo}}</strong>
                    <div style="height: 20px" class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                      <div class="progress-bar" style="width: {{$inservivelcomLaudo}}%"></div>
                    </div>
                </div>

                </div>
              </div>

            </div>
            <button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>

      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                2023 -
                Sistema de controle de Protocolos do setor de Tecnologia da Informação - <br> <strong>Secretaria de Educação.</strong>

              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">

                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">Versão 2.0</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
  </div>
@endsection
