<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        ProtocolosTI
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('../assets/css/argon-dashboard.css?v=2.0.4')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<style>
     body::-webkit-scrollbar {
            width: 12px;               /* width of the entire scrollbar */
            }

        body::-webkit-scrollbar-track {
            background: grey;        /* color of the tracking area */
            }

        body::-webkit-scrollbar-thumb {
            background-color: #024f9b;    /* color of the scroll thumb */
            border-radius: 20px;       /* roundness of the scroll thumb */
            }
</style>
<body id="body" class="g-sidenav-show   bg-gray-100 ">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>

    <aside
        class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
        id="sidenav-main">
        <div style="height: 100px" class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
                <i id="fechar" style="cursor: pointer" class="bi bi-x-lg ms-11 mt-3"></i>
                <span style="margin-left:70px; margin-top: 200px" class=" font-weight-bold">
                    <a href="">
                        ProtocolosTI
                    </a>
                </span>
            </a>
        </div>
        <br><br>
        <hr class="horizontal dark mt-0">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('dashboard') }}">

                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('atendimento-escola.index')}}">

                    <span class="nav-link-text ms-1">Atendimento as Escolas</span>
                </a>
            </li>

            <li class="nav-item ms-3">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button style="font-size: 14px" class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                Protocolos de Entrada
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div style="color: black" class="list-group">
                                    <a href="{{ route('protocolo.create') }}"
                                        class="list-group-item list-group-item-action">Cadastrar</a>
                                    <a href="{{ route('protocolo.index') }}"
                                        class="list-group-item list-group-item-action">Ver todos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item ms-3">
                <div class="accordion accordion-flush" id="inservivel">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button style="font-size: 14px" class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapsed-internos" aria-expanded="false"
                                aria-controls="collapsed-internos">
                               Atendimentos Internos
                            </button>
                        </h2>
                        <div id="collapsed-internos" class="accordion-collapse collapse"
                            data-bs-parent="#internos">
                            <div class="accordion-body">
                                <div style="color: black" class="list-group">
                                    <a href="{{ route('interno.create') }}"
                                        class="list-group-item list-group-item-action">Cadastrar</a>
                                    <a href="{{ route('interno.index') }}"
                                        class="list-group-item list-group-item-action">Ver todos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('estante.index') }}">

                    <span class="nav-link-text ms-1">Estante de Equipamentos </span>
                </a>
            </li>

            <li class="nav-item ms-3">
                <div class="accordion accordion-flush" id="inservivel">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button style="font-size: 14px" class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapsed-inservivel" aria-expanded="false"
                                aria-controls="collapsed-inservivel">
                               Inservível
                            </button>
                        </h2>
                        <div id="collapsed-inservivel" class="accordion-collapse collapse"
                            data-bs-parent="#inservivel">
                            <div class="accordion-body">
                                <div style="color: black" class="list-group">
                                    <a href="{{ route('inservivel.create') }}"
                                        class="list-group-item list-group-item-action">Criar laudo</a>
                                    <a href="{{ route('inservivel.index') }}"
                                        class="list-group-item list-group-item-action">Ver todos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item ms-3">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button style="font-size: 14px" class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#graficos" aria-expanded="false"
                                aria-controls="graficos">
                                Gráficos
                            </button>
                        </h2>
                        <div id="graficos" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div style="color: black" class="list-group">
                                   
                                    <a href="{{ route('graficos.anual') }}"
                                        class="list-group-item list-group-item-action">Anual</a>
                                    <a href="{{ route('protocolo.create') }}"
                                        class="list-group-item list-group-item-action">Participações</a>
                                    <a href="{{ route('protocolo.index') }}"
                                        class="list-group-item list-group-item-action">Inservíveis</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('escolas.index')}}">

                    <span class="nav-link-text ms-1">Escolas</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('historico.index') }}">

                    <span class="nav-link-text ms-1">Histórico de Máquinas </span>
                </a>
            </li>
            @if(Gate::allows('protocolo'))
                <li class="nav-item ms-3">
                    <div class="accordion accordion-flush" id="usuarios">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button style="font-size: 14px" class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapsed-usuarios" aria-expanded="false"
                                    aria-controls="collapsed-usuarios">
                                    Usuários
                                </button>
                            </h2>
                            <div id="collapsed-usuarios" class="accordion-collapse collapse"
                                data-bs-parent="#usuarios">
                                <div class="accordion-body">
                                    <div style="color: black" class="list-group">
                                        <a href="{{ route('user.create') }}"
                                            class="list-group-item list-group-item-action">Cadastrar usuários</a>
                                        <a href="{{ route('user.index') }}"
                                            class="list-group-item list-group-item-action">Ver todos</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            @endif
    </aside>
    <main class="main-content position-relative border-radius-lg ">

        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white"
                                href="javascript:;">Home</a></li>
                        @yield('title')
                </nav>
                <ul class="navbar-nav  justify-content-end">
                    @if (Auth::check())
                        <li class="nav-item d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none">{{ strtoupper(Auth::user()->name) }}</span>
                            </a>
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav ">
                                <div class="sidenav-toggler-inner menu">
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item px-3 d-flex align-items-center ">
                            <a href="{{ route('logout', Auth::user()->id) }}" class="nav-link text-white p-0">
                                <i class="bi bi-box-arrow-right"></i>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item dropdown pe-2 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        </a>
                    </li>
                </ul>
            </div>
            </div>
        </nav>


        <!-- CONTENT -->
        <div class="container-fluid py-4">
            @yield('content')
        </div>
    </main>



    <!--   Core JS Files   -->
    <script src="{{asset('../assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('../assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('../assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('../assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
    <script src="{{asset('../assets/js/plugins/chartjs.min.js')}}"></script>
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#5e72e4",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="{{asset('https://buttons.github.io/buttons.js')}}"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('../assets/js/argon-dashboard.min.js?v=2.0.4')}}"></script>
    <script src="{{asset('/assets/js/jquery.js')}}"></script>
    <script src="{{asset('/assets/js/template/template.js')}}"></script>
</body>

</html>
