<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
      Argon Dashboard 2 by Creative Tim
    </title>
    <!--     Fonts and icons     -->
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700')}}" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('../assets/css/nucleo-icons.css" rel="stylesheet')}}"/>
    <link href="{{asset('../assets/css/nucleo-svg.css" rel="stylesheet')}}" />
    <!-- Font Awesome Icons -->
    <script src="{{asset('https://kit.fontawesome.com/42d5adcbca.js')}}" crossorigin="anonymous"></script>
    <link href="{{asset('../assets/css/nucleo-svg.css" rel="stylesheet')}}" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('../assets/css/argon-dashboard.css?v=2.0.4')}}" rel="stylesheet" />
  </head>


<div  class="min-height-300 bg-primary position-absolute w-100"></div>
<aside
    class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div style="height: 100px" class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a style="300px;" class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html "
            target="_blank">
            <img style="margin-left: 70px; margin-top:30px; width: 50px; height:40px" src="{{URL::asset('/assets/img/sme.png ')}}" class="" alt="main_logo"><br>
                <span style="margin-left:30px" class="ms-1 font-weight-bold"><h6 style="position: relative; left: 50px">ProtocolosTI</h6></span>
        </a>
    </div>

    <br><br>
    <hr class="horizontal dark mt-0">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="../pages/dashboard.html">

                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="../pages/tables.html">

                    <span class="nav-link-text ms-1">Atendimento as Escolas</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link





                " href="../pages/billing.html">

                    <span class="nav-link-text ms-1">Protocolos de Entrada</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="../pages/virtual-reality.html">

                    <span class="nav-link-text ms-1">Atendimento Interno</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('estante.index')}}">

                    <span class="nav-link-text ms-1">Estante de Equipamentos </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="../pages/profile.html">

                    <span class="nav-link-text ms-1">Inservível</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="../pages/sign-in.html">

                    <span class="nav-link-text ms-1">Gráficos</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="../pages/sign-up.html">

                    <span class="nav-link-text ms-1">Escolas</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="../pages/sign-up.html">

                    <span class="nav-link-text ms-1">Histórico de Máquinas  </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="../pages/sign-up.html">

                    <span class="nav-link-text ms-1">Usuários</span>
                </a>
            </li>

</aside>
<!--   Core JS Files   -->
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="../assets/js/plugins/chartjs.min.js"></script>
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
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
@yield('conteudo')
