<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>entistmamou</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  
  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
  
  <!-- Favicons -->
  <link href="{{ asset('assets/img/logo-ent-trans.png') }}" rel="icon">
  <link href="{{ asset('assets/img/logo-ent-trans.png') }}" rel="apple-touch-icon">


  <!-- pour le select2 -->
  <script src="{{asset('assets/js/jquery-3.6.3.min.js')}}"></script>
  <link href="{{ asset('assets/css/select2.css') }}" rel="stylesheet">

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
            <h3 class="d-none d-lg-block ms-3 mt-2 title-top-bar ">Service Scolarité</h3>
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
              <h6>{{ Auth::user() ? Auth::user()->name : '' }}</h6>
              <span>{{ Auth::user() ? Auth::user()->email : '' }}</span>
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
              <hr class="dropdown-divider">
            </li>

            <li>
              <form method="POST" action="{{ route('logout') }}" x-data>
                  @method('post')
                  @csrf

                  <button class="dropdown-item d-flex align-items-center">
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
          <a class="nav-link" href="{{ route('scolarite.dashboard') }}">
            <i class="fa fa-home"></i>
            <span class="">Tableau de bord</span>
          </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="fa fa-graduation-cap"></i><span>Etudiants</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('scolarite.orientation') }}">
                  <i class="fa fa-list"></i><span>List Etudiants orientés</span>
                </a>
            </li>
            <li>
              <a href="{{ route('scolarite.inscription') }}" wire:navigate>
                <i class="fa fa-user-plus"></i><span>Inscription (orienté)</span>
              </a>
            </li>
            <li>
              <a href="{{ route('scolarite.inscriptionnonOriente') }}" wire:navigate>
                <i class="fa fa-user-plus"></i><span>Inscription (non orienté)</span>
              </a>
            </li>
            <li>
              <a href="{{ route('scolarite.inscriptionetreinscription.index') }}">
                <i class="fa fa-list"></i><span>List inscrits & reinscrits</span>
              </a>
            </li>
            <li>
              <a href="{{ route('scolarite.reinscription') }}">
                <i class="fa fa-users"></i><span>Reinscription</span>
              </a>
            </li>
          </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('scolarite.notes') }}" wire:navigate>
            <i class="bi bi-journal-richtext"></i>
            <span>Notes</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Rélévé de notes</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{route('scolarite.releve.index')}}">
                <i class="fa fa-list"></i><span>Les relevés</span>
              </a>
            </li>
            <li>
              <a href="{{route('scolarite.print.formreleve')}}">
                <i class="fa fa-clone"></i><span>Relevé Semestriel</span>
              </a>
            </li>
            <li>
              <a href="{{route('scolarite.print.releveAnnuelform')}}">
                <i class="fa fa-calendar"></i><span>Relevé Annuel</span>
              </a>
            </li>
          </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>Attestations</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{route('scolarite.attestation.index')}}">
                <i class="fa fa-list"></i><span>Toutes les attestations</span>
              </a>
            </li>
            <li>
              <a href="{{route('scolarite.attestation.inscription')}}">
                <i class="fa fa-user-plus"></i><span>Imprimer les attestations</span>
              </a>
            </li>
          </ul>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('scolarite.print') }}">
            <i class="fa fa-id-badge"></i>
            <span>Badges</span>
          </a>
        </li><!-- End badge Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('scolarite.parametre') }}">
            <i class="fa fa-cog"></i>
            <span>Paramètres</span>
          </a>
        </li><!-- End params Page Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('scolarite.service.index') }}">
            <i class="fa fa-desktop"></i>
            <span>Services</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('scolarite.partagefile') }}" wire:navigate>
            <i class="fa fa-share-square"></i>
            <span>Partage de Fichier</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('chatify') }}" wire:navigate>
            <i class="fa fa-comment"></i>
            <span>Chats</span>
          </a>
        </li>

      </ul>

    </aside><!-- End Sidebar-->


    <!-- ======= Main ======= -->
    <main id="main" class="main">
      {{ $slot }}
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
  <script src="{{ asset('assets/js/select2.js') }}"></script>
  <script>
    // $(document).ready(function() {
    //     $('#matricules').select2(); // Initialiser Select2
    // });
  </script>
  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
