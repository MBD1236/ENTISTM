<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Administrateur Dahasbord</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- pour le select2 -->
  <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet">
  <script src="{{asset('assets/js/jquery-3.6.0.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/select2.min.js') }}"></script>

  <!-- Favicons -->
  <link href="{{ asset('assets/img/logo-ent-trans.png') }}" rel="icon">
  <link href="{{ asset('assets/img/logo-ent-trans.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

</head>

<body>
    <!-- ======= Header top-bar ======= -->
    <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ route('scolarite.dashboard') }}" class="logo d-flex align-items-center">
        <img src="{{ asset('assets/img/logo-ent-trans.png') }}" alt="">
        <span class="d-none d-lg-block">Espace<br> Numérique de Travail</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="row">
        <div class="col">
            <h3 class="d-none d-lg-block ms-3 mt-2 title-top-bar ">Espace Administration</h3>
        </div>
    </div>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ auth()->user()->name }}</h6>
              <span>{{ auth()->user()->email }}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.show') }}">
                <i class="bi bi-person"></i>
                <span>Mon Profil</span>
              </a>
            </li>
            
            
            <li>
              <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                  @csrf
                  <button type="submit" class="dropdown-item d-flex align-items-center" style="border: none; background: none; cursor: pointer;">
                      <i class="bi bi-box-arrow-right"></i>
                      <span>Déconnexion</span>
                  </button>
              </form>
          </li>


          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

    <!-- ======= Header side-bar ======= -->

    <!-- ======= Sidebar ======= -->

    <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('admin.dashboard') }}">
            <i class="fa fa-home"></i>
            <span>Tableau de bord</span>
          </a>
        </li><!-- End service Page Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="fa fa-users"></i><span>Gestion des utilisateurs</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{ route('admin.roles') }}" wire:navigate>
                <i class="fa fa-book"></i><span>Roles</span>
              </a>
            </li>
            <li>
              <a href="{{ route('admin.utilisateurs') }}" wire:navigate>
                <i class="fa fa-user"></i><span>Utilisateurs</span>
              </a>
            </li>
          </ul>
        </li><!-- End Components Nav -->
      </ul>
      <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#components-nav2" data-bs-toggle="collapse" href="#">
            <i class="fa fa-cog"></i><span>Paramétrages</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="components-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{ route('admin.departements') }}" wire:navigate>
                <i class="fa fa-book"></i><span>Departements</span>
              </a>
            </li>
            <li>
              <a href="{{ route('admin.programmes') }}" wire:navigate>
                <i class="fa fa-book"></i><span>Programmes</span>
              </a>
            </li>
            <li>
              <a href="{{ route('admin.promotions') }}" wire:navigate>
                <i class="fa fa-book"></i><span>Promotions</span>
              </a>
            </li>
            <li>
              <a href="{{ route('admin.anneeuniversitaires') }}" wire:navigate>
                <i class="bi bi-clock"></i><span>Année Universitaires</span>
              </a>
            </li>
            <li>
              <a href="{{ route('admin.niveaux') }}" wire:navigate>
                <i class="bi bi-book"></i><span>Niveaux</span>
              </a>
            </li>
            <li>
              <a href="{{ route('admin.semestres') }}" wire:navigate>
                <i class="bi bi-book"></i><span>Semestres</span>
              </a>
            </li>
          </ul>
        </li><!-- End Components Nav -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('admin.service.index') }}">
            <i class="fa fa-desktop"></i>
            <span>Services</span>
          </a>
        </li><!-- End service Page Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#partages-nav" data-bs-toggle="collapse" href="#">
            <i class="fa fa-share"></i><span>Partage de Fichier</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="partages-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{route('admin.partagefile.recu')}}">
                <i class="fa fa-list"></i>
                <span>Fichiers Reçus</span>
              </a>
            </li>
            <li>
              <a href="{{ route('admin.partagefile') }}">
                <i class="fa fa-share-alt"></i>
                <span>Partage de Fichier</span>
              </a>
            </li>
          </ul>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('chatify') }}">
            <i class="fa fa-comment"></i>
            <span>Chats</span>
          </a>
        </li><!-- End F.A.Q Page Nav -->

      </ul>
      
    </aside><!-- End Sidebar-->


    <!-- ======= Main ======= -->
    <main id="main" class="main">
        @yield('content')
    </main>


  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>ENT IST-Mamou</span></strong>. Tous droits reservés
    </div>
    <div class="credits">
      Dévéloppée par <a href="https://bootstrapmade.com/">l'Equipe ENT IST-Mamou | Génie Info-P15</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
