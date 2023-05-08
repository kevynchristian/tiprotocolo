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

@yield('menu')
