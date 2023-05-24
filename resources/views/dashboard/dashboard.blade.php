@extends('layout.template')
@section('content')
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
      <div class="col-lg-7 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100">
          <div class="card-header pb-0 pt-3 bg-transparent">
            <h6 class="text-capitalize">Atividades do mês</h6>
            <div class="col-12 mt-5">
                Atendimentos Internos: {{$atendimentoInternoMes}}
                  <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar" style="width: {{$atendimentoInternoMes}}%"></div>
                  </div><br>
                Atendimento as Escolas: {{$atendimentoEscolaMes}}
                <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                  <div class="progress-bar" style="width: {{$atendimentoEscolaMes}}%"></div>
                </div><br>
                Conserto em equipamentos: {{$consertos}}
                <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                  <div class="progress-bar" style="width: {{$consertos}}%"></div>
                </div>
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
              <div class="carousel-item h-100 active">
                <h2>Em aberto</h2>
                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                  <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                    <i class="ni ni-camera-compact text-dark opacity-10"></i>
                  </div>
                  <h5 class="text-white mb-1">Get started with Argon</h5>
                  <p>There’s nothing I really wanted to do in life that I wasn’t able to get good at.</p>
                </div>
              </div>
              <div class="carousel-item h-100" style="background-image: url('../assets/img/carousel-2.jpg');
    background-size: cover;">
                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                  <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                    <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                  </div>
                  <h5 class="text-white mb-1">Faster way to create web pages</h5>
                  <p>That’s my skill. I’m not really specifically talented at anything except for the ability to learn.</p>
                </div>
              </div>
              <div class="carousel-item h-100" style="background-image: url('../assets/img/carousel-3.jpg');
    background-size: cover;">
                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                  <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                    <i class="ni ni-trophy text-dark opacity-10"></i>
                  </div>
                  <h5 class="text-white mb-1">Share with us your design tips!</h5>
                  <p>Don’t be afraid to be wrong because you can’t learn anything from a compliment.</p>
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
    </div>
  
    <footer class="footer pt-3  ">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              © <script>
                document.write(new Date().getFullYear())
              </script>,
              made with <i class="fa fa-heart"></i> by
              <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
              for a better web.
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
@endsection
