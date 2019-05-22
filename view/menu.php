<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <img src="/sgeIF/public/img/if.png" height="2%" width="2%">
    <a class="navbar-brand" href="/sgeIF/administrador/index">sgeIF</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="/sgeIF/administrador/index">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Páginas de Cadastro</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
             <li>
              <a href="/sgeIF/administrador/add">Cadastro de Administrador</a>
            </li>
            <li>
              <a href="/sgeIF/ministrante/add">Cadastro de Ministrantes</a>
            </li>
            <li>
              <a href="/sgeIF/evento/add">Cadastro de Eventos</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Consultas">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Consultas</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="/sgeIF/ministrante/index">Consulta de Ministrantes</a>
            </li>
            <li>
              <a href="/sgeIF/evento/index">Consulta de Eventos</a>
            </li>
            <li>
              <a href="/sgeIF/atividade/index">Consulta de Atividades</a>
            </li>
            <li>
            <a href="/sgeIF/participante/index">Lista de Participantes Cadastrados (Geral)</a>
          </li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="/sgeIF/login/logout" class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>