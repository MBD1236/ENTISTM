<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

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
      <a href="{{ route('scolarite.dashboard') }}" class="logo d-flex align-items-center nav-link text-decoration-none">
        <img src="{{ asset('assets/img/logo-ent-trans.png') }}" alt="">
        <span class="d-none d-lg-block">Espace<br> Numérique de Travail</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="row">
        <div class="col">
            <h3 class="d-none d-lg-block ms-3 mt-2 title-top-bar ">Département</h3>
        </div>
    </div>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
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
          {{-- @can('genie_info') --}}
          <li class="nav-heading">Génie Informatique</li>
          <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#etudiants-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-person"></i><span>Etudiants</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="etudiants-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('genieinfo.etudiants') }}" wire:navigate>
                          <i class="fa fa-users"></i><span>Etudiants</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('genieinfo.inscriptions') }}" wire:navigate>
                          <i class="fa fa-user-plus"></i><span>Inscrits</span>
                      </a>
                  </li>
              </ul>
          </li>
          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('genieinfo.enseignant.list') }}" wire:navigate>


                  <i class="bi bi-person"></i><span>Enseignants</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('genieinfo.matieres') }}" wire:navigate>
                   <i class="bi bi-book"></i><span>Matieres</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('genieinfo.planification') }}" wire:navigate>
                   <i class="bi bi-body-text"></i><span>Planification cours</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#note-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-journal-richtext"></i><span>Notes</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="note-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('genieinfo.notes') }}" wire:navigate>
                          <i class="bi bi-plus"></i><span>Enrégistrement des notes</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('genieinfo.notes.matiere') }}" wire:navigate>
                          <i class="bi bi-book"></i><span>Note par matiere</span>
                      </a>
                  </li>
                   <li>
                      <a href="{{ route('genieinfo.notes.semestre') }}" wire:navigate>
                          <i class="fa fa-clone"></i><span>Notes semestrielles</span>
                      </a>
                  </li>
              </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('genieinfo.information.list') }}">
                <i class="bi bi-info-circle-fill"></i><span>Infos département</span>
            </a>
          </li>

          {{-- @endcan --}}

          {{-- @can('science_energie') --}}
          <li class="nav-heading">Science des Energies</li>
          <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#etudiants-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-person"></i><span>Etudiants</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="etudiants-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('scienceenergie.etudiants') }}" wire:navigate>
                          <i class="fa fa-users"></i><span>Etudiants</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('scienceenergie.inscriptions') }}" wire:navigate>
                          <i class="fa fa-user-plus"></i><span>Inscrits</span>
                      </a>
                  </li>
              </ul>
          </li>
          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('scienceenergie.enseignants') }}" wire:navigate>
                  <i class="bi bi-person"></i><span>Enseignants</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('scienceenergie.matieres') }}" wire:navigate>
                   <i class="bi bi-book"></i><span>Matieres</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('scienceenergie.planification') }}" wire:navigate>
                   <i class="bi bi-body-text"></i><span>Planification cours</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#note-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-journal-richtext"></i><span>Notes</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="note-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('scienceenergie.notes') }}" wire:navigate>
                          <i class="bi bi-plus"></i><span>Enrégistrement des notes</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('scienceenergie.notes.matiere') }}" wire:navigate>
                          <i class="bi bi-book"></i><span>Note par matiere</span>
                      </a>
                  </li>
                   <li>
                      <a href="{{ route('scienceenergie.notes.semestre') }}" wire:navigate>
                          <i class="fa fa-clone"></i><span>Notes semestrielles</span>
                      </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('scienceenergie.information.list') }}">
                    <i class="bi bi-info-circle-fill"></i><span>Infos département</span>
                </a>
              </li>
          {{-- @endcan --}}

          {{-- @can('imp') --}}
          <li class="nav-heading">Instrumentation et Mesures Physiques</li>
          <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#etudiants-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-person"></i><span>Etudiants</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="etudiants-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('imp.etudiants') }}" wire:navigate>
                          <i class="fa fa-users"></i><span>Etudiants</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('imp.inscriptions') }}" wire:navigate>
                          <i class="fa fa-user-plus"></i><span>Inscrits</span>
                      </a>
                  </li>
              </ul>
          </li>
          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('imp.enseignants') }}" wire:navigate>
                  <i class="bi bi-person"></i><span>Enseignants</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('imp.matieres') }}" wire:navigate>
                   <i class="bi bi-book"></i><span>Matieres</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('imp.planification') }}" wire:navigate>
                   <i class="bi bi-body-text"></i><span>Planification cours</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#note-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-journal-richtext"></i><span>Notes</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="note-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('imp.notes') }}" wire:navigate>
                          <i class="bi bi-plus"></i><span>Enrégistrement des notes</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('imp.notes.matiere') }}" wire:navigate>
                          <i class="bi bi-book"></i><span>Note par matiere</span>
                      </a>
                  </li>
                   <li>
                      <a href="{{ route('imp.notes.semestre') }}" wire:navigate>
                          <i class="fa fa-clone"></i><span>Notes semestrielles</span>
                      </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('imp.information.list') }}">
                    <i class="bi bi-info-circle-fill"></i><span>Infos département</span>
                </a>
              </li>
          {{-- @endcan --}}

          {{-- @can('genie_info') --}}
          <li class="nav-heading">Conception et Fabrication Mécanique</li>
          <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#etudiants-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-person"></i><span>Etudiants</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="etudiants-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('cfm.etudiants') }}" wire:navigate>
                          <i class="fa fa-users"></i><span>Etudiants</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('cfm.inscriptions') }}" wire:navigate>
                          <i class="fa fa-user-plus"></i><span>Inscrits</span>
                      </a>
                  </li>
              </ul>
          </li>
          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('cfm.enseignants') }}" wire:navigate>
                  <i class="bi bi-person"></i><span>Enseignants</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('cfm.matieres') }}" wire:navigate>
                   <i class="bi bi-book"></i><span>Matieres</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('cfm.planification') }}" wire:navigate>
                   <i class="bi bi-body-text"></i><span>Planification cours</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#note-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-journal-richtext"></i><span>Notes</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="note-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('cfm.notes') }}" wire:navigate>
                          <i class="bi bi-plus"></i><span>Enrégistrement des notes</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('cfm.notes.matiere') }}" wire:navigate>
                          <i class="bi bi-book"></i><span>Note par matiere</span>
                      </a>
                  </li>
                   <li>
                      <a href="{{ route('cfm.notes.semestre') }}" wire:navigate>
                          <i class="fa fa-clone"></i><span>Notes semestrielles</span>
                      </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('cfm.information.list') }}">
                    <i class="bi bi-info-circle-fill"></i><span>Infos département</span>
                </a>
              </li>
          {{-- @endcan --}}

          {{-- @can('genie_info') --}}
          <li class="nav-heading">Technologie des Equipements Biomédicaux</li>
          <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#etudiants-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-person"></i><span>Etudiants</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="etudiants-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('teb.etudiants') }}" wire:navigate>
                          <i class="fa fa-users"></i><span>Etudiants</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('teb.inscriptions') }}" wire:navigate>
                          <i class="fa fa-user-plus"></i><span>Inscrits</span>
                      </a>
                  </li>
              </ul>
          </li>
          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('teb.enseignants') }}" wire:navigate>
                  <i class="bi bi-person"></i><span>Enseignants</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('teb.matieres') }}" wire:navigate>
                   <i class="bi bi-book"></i><span>Matieres</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('teb.planification') }}" wire:navigate>
                   <i class="bi bi-body-text"></i><span>Planification cours</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#note-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-journal-richtext"></i><span>Notes</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="note-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('teb.notes') }}" wire:navigate>
                          <i class="bi bi-plus"></i><span>Enrégistrement des notes</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('teb.notes.matiere') }}" wire:navigate>
                          <i class="bi bi-book"></i><span>Note par matiere</span>
                      </a>
                  </li>
                   <li>
                      <a href="{{ route('teb.notes.semestre') }}" wire:navigate>
                          <i class="fa fa-clone"></i><span>Notes semestrielles</span>
                      </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('teb.information.list') }}">
                    <i class="bi bi-info-circle-fill"></i><span>Infos département</span>
                </a>
              </li>
          {{-- @endcan --}}

          {{-- @can('genie_info') --}}
          <li class="nav-heading">Techniques de Laboratoires</li>
          <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#etudiants-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-person"></i><span>Etudiants</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="etudiants-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('tl.etudiants') }}" wire:navigate>
                          <i class="fa fa-users"></i><span>Etudiants</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('tl.inscriptions') }}" wire:navigate>
                          <i class="fa fa-user-plus"></i><span>Inscrits</span>
                      </a>
                  </li>
              </ul>
          </li>
          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('tl.enseignants') }}" wire:navigate>
                  <i class="bi bi-person"></i><span>Enseignants</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('tl.matieres') }}" wire:navigate>
                   <i class="bi bi-book"></i><span>Matieres</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('tl.planification') }}" wire:navigate>
                   <i class="bi bi-body-text"></i><span>Planification cours</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#note-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-journal-richtext"></i><span>Notes</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="note-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('tl.notes') }}" wire:navigate>
                          <i class="bi bi-plus"></i><span>Enrégistrement des notes</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('tl.notes.matiere') }}" wire:navigate>
                          <i class="bi bi-book"></i><span>Note par matiere</span>
                      </a>
                  </li>
                   <li>
                      <a href="{{ route('tl.notes.semestre') }}" wire:navigate>
                          <i class="fa fa-clone"></i><span>Notes semestrielles</span>
                      </a>
                  </li>
              </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('tl.information.list') }}">
                <i class="bi bi-info-circle-fill"></i><span>Infos département</span>
            </a>
          </li>

          {{-- @endcan --}}

      </ul>

  </aside>
    <!-- End Sidebar-->

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
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
