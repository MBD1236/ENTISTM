<!DOCTYPE html>
<html  class="no-js" lang="fr">

<!-- Mirrored from preetheme.com/rana/skill-full-demo/main-file/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Nov 2023 12:44:12 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>entistmamou</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo-ent-trans.png') }}">
<!-- Place favicon.ico in the root directory -->
<!-- CSS here -->
<link rel="stylesheet" href="{{ asset('assets/front/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/css/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/css/animate.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/css/meanmenu.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/css/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/css/default.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/css/responsive.css') }}">
</head>
<body>
<div id="preloader"></div>
<header>
    <div class="main-header-area">
        <div class="header-top-menu">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-9 col-sm-7">
                        <div class="top-left">
                            <ul>
                                <li><i class="fa-solid fa-phone"></i><a href="#" title="">+224 627 99 72 35</a></li>
                                <li><i class="fa-solid fa-clock"></i> 07:00 AM - 18:00 AM</li>
                                <li><i class="fa-solid fa-location-pin"></i>Télico, Mamou, GN</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-3 col-sm-5">
                        <div class="top-right">
                            <ul>
                                <li><a href="#" title=""><i class="fa-brands fa-facebook"></i></a></li>
                                <li><a href="#" title=""><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="#" title=""><i class="fa-brands fa-linkedin"></i></a></li>
                                <li><a href="#" title=""><i class="fa-brands fa-youtube"></i></a></li>
                                <li class="search"><a href="#" title=""><i class="fa-solid fa-magnifying-glass"></i></a></li>
                                <li class="search-form">
                                    <form action="#">
                                        <input type="text" name="search" placeholder="search">
                                        <div class="transparent-ico">
                                            <button class="s-btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mean-menu-wrapper header-middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-5 col-sm-6">
                        <div class="logo">
                            <a href="{{ route('front.accueil') }}"><img class="img-fluid" src="{{ asset('assets/front/img/logo/logo-5-entistmamou.png') }}" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-4 col-sm-3">
                        <div class="canvas_open">
                            <a href="javascript:void(0)"><i class="fas fa-bars"></i></a>
                        </div>
                        <div class="mean-menu">
                            <nav>
                                <ul>
                                    <li><a href="#" title="">Institut<i class="fa-solid fa-angle-down"></i></a>
                                        <ul class="submenu">
                                            <li><a href="courses-grid.html" title="">Présentation</a></li>
                                            <li><a href="courses-grid.html" title="">Mot du Recteur</a></li>
                                            <li><a href="courses-grid.html" title="">Direction</a></li>
                                            <li><a href="courses-grid.html" title="">Missions/Organisations</a></li>
                                            <li><a href="courses-grid.html" title="">Textes et réglements</a></li>
                                            <li><a href="courses-grid.html" title="">Recherche scientifique</a></li>
                                        </ul>
                                   </li>
                                    <li><a href="#" title="">Départements<i class="fa-solid fa-angle-down"></i></a>
                                        <ul class="submenu">
                                            @foreach ($departements as $departement )
                                                <li><a href="courses-grid.html" title="">{{ $departement->departement }}</a></li>
                                            @endforeach
                                        </ul>
                                   </li>
                                   <li><a href="#" title="">Actualités<i class="fa-solid fa-angle-down"></i></a>
                                      <ul class="submenu">
                                          <li><a href="blog-grid.html" title="">blog grid</a></li>
                                          <li><a href="blog-single.html" title="">blog single</a></li>
                                      </ul>
                                   </li>
                                   <li><a href="#" title="">Etudiant<i class="fa-solid fa-angle-down"></i></a>
                                    <ul class="submenu">
                                        <li><a href="my-acount.html" title="">Vie étudiant</a></li>
                                        <li><a href="gallery.html" title="">Galérie</a></li>
                                        <li><a href="coming-soon.html" title="">Alumni</a></li>
                                    </ul>
                                </li>
                                <li><a href="our-teacher.html" title="">Admission<i class="fa-solid fa-angle-down"></i></a>
                                   <ul class="submenu">
                                       <li><a href="our-teacher.html" title="">Documents de candidature</a></li>
                                       <li><a href="teacher-single.html" title="">Candidater</a></li>
                                   </ul>
                                 </li>
                                <li><a href="contact.html" title="">contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3">
                        <div class="top-login">
                            <a href="{{ route('login') }}">login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Start Mobile Menu Area -->
    <div class="mobile-menu-area">

        <!--offcanvas menu area start-->
        <div class="off_canvars_overlay">

        </div>
        <div class="offcanvas_menu">
            <div class="offcanvas_menu_wrapper">
                <div class="canvas_close">
                    <a href="javascript:void(0)"><i class="fas fa-times"></i></a>
                </div>
                <div class="mobile-logo">
                    <a href="index.html" title="logo"><img class="img-fluid" src="img/logo/logo.png" alt="logo"></a>
                </div>
                <div id="menu" class="text-left ">
                    <ul class="offcanvas_main_menu">
                        <li class="menu-item-has-children active">
                            <a href="index.html">Home</a>
                            <ul class="sub-menu">
                               <li><a href="index.html" title="">home 1</a></li>
                               <li><a href="index2.html" title="">home 2</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="about.html">about</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">courses</a>
                            <ul class="sub-menu">
                               <li><a href="courses-grid.html" title="">courses grid</a></li>
                               <li><a href="courses-left-sidebar.html" title="">courses left sidebar</a></li>
                               <li><a href="courses-right-sidebar.html" title="">courses right sidebar</a></li>
                               <li><a href="courses-single.html" title="">courses right single</a></li>

                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="Case-Studies.html">teacher</a>
                            <ul class="sub-menu">
                               <li><a href="our-teacher.html" title="">our teacher</a></li>
                               <li><a href="teacher-single.html" title="">teacher single</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="blog.html">pages</a>
                            <ul class="sub-menu">
                               <li><a href="service.html" title="">service</a></li>
                               <li><a href="my-acount.html" title="">my acount</a></li>
                               <li><a href="gallery.html" title="">gallery</a></li>
                               <li><a href="faq.html" title="">faq</a></li>
                               <li><a href="coming-soon.html" title="">coming soon</a></li>
                               <li><a href="404.html" title="">404 page</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="contact.html">blog</a>
                            <ul class="sub-menu">
                               <li><a href="blog-grid.html" title="">blog grid</a></li>
                               <li><a href="blog-single.html" title="">blog single</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="contact.html">contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--offcanvas menu area end-->
<!-- End Mobile Menu Area -->
</header>
<main>
    <!-- hero-area-start -->
<section>
   <div class="hero-area">
       <div class="full-slide  owl-carousel">
        <!-- single-item -->
           <div class="full-single-slide bg-overly slider2">
                <div class="slider-progres">
                    <div class="progress">
                      <div role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="container">
                   <div class="row">
                       <div class="col-xl-12">
                            <div class="hero-content overly-none text-center">
                                <h2 class="mb-4">Institut Supérieur de Technologie de Mamou</h2>
                                <h4>Le Temple de l'Innovation et de la Technologie en République de Guinée.</h4>
                                <div class="learn-more">
                                    <a class="f-btn text-over" href="#">Lire la suite</a>
                                </div>
                            </div>
                       </div>
                   </div>
               </div>
           </div>
        <!-- single-item -->
           <div class="full-single-slide bg-overly slider3">
                <div class="slider-progres">
                    <div class="progress">
                      <div role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="container">
                   <div class="row">
                       <div class="col-xl-12">
                            <div class="hero-content overly-none text-center">
                                <h2 class="mb-4">Institut Supérieur de Technologie de Mamou</h2>
                                <h4>Le Temple de l'Innovation et de la Technologie en République de Guinée.</h4>
                                <div class="learn-more">
                                    <a class="f-btn text-over" href="#">Lire la suite</a>
                                </div>
                            </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
</section>
<!-- hero-area-end -->
<!-- weelcome-area-start -->
  <section class="wellcome-area section-bg ptb">
      <div class="container">
          <div class="col-lg-8 offset-lg-2">
              <div class="section-title text-center">
                  <h2 class="h-blue">Bienvenue sur notre Espace numérique !</h2>
                  <i class="fa-solid fa-book-open-reader"></i>
                  <p>L'Espace numérique de l'Institut Supérieur de Technologie de Mamou (IST-Mamou) est votre portail vers l'innovation et la collaboration. Ouvert à tous, cet espace est conçu pour fournir un accès facile et rapide à une multitude de ressources et de services en ligne, renforçant ainsi notre engagement envers l'éducation de qualité et l'excellence technologique.</p>
              </div>
          </div>
      </div>
  </section>
<!-- weelcome-area-end -->
<!-- divider-area-start -->
<section class="divider-area ptb bg-overly divider">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="divider-content">
                    <h2>Vous aviez besoin d'aide ?</h2>
                    <p>Besoin d'assistance ou d'informations supplémentaires ? Notre équipe est à votre disposition pour répondre à toutes vos questions et vous offrir le support dont vous avez besoin.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="divider-contact divider-content">
                    <h2>Appelez-Nous !</h2>
                    <span><i class="fa-solid fa-phone"></i>+224 627 99 72 35</span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- devaider-area-end -->
<!-- latest-blog-start -->
<section class="latest-blog-area pt-80 pb-60">
    <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-3">
              <div class="section-title text-center mb-5">
                  <h2>Nos Actualités</h2>
                  <div class="sevaider"><i class="fa-solid fa-book-open-reader"></i></div>
                  <p>Restez informé des dernières nouvelles et événements de l'Institut Supérieur de Technologie de Mamou (IST-Mamou). Découvrez ce qui se passe sur notre campus, les accomplissements de nos étudiants et enseignants, ainsi que les initiatives et projets en cours.</p>
              </div>
          </div>
        </div>
        <div class="row">
            @foreach ($articles as $article)
                <div class="col-lg-4 col-md-6 mb-20">
                    <div class="single-blog">
                        <div class="blog-img">
                            @if ($article->media_type === 'image' && $article->image_path)
                                <img class="img-fluid" src="{{ Storage::url($article->image_path) }}" alt="Image de l'article">
                            @elseif ($article->media_type === 'video' && $article->video_path)
                                <video class="img-fluid" controls>
                                    <source src="{{ Storage::url($article->video_path) }}" type="video/mp4">
                                    Votre navigateur ne supporte pas la balise vidéo.
                                </video>
                            @else
                                <img class="img-fluid" src="{{ asset('assets/front/img/blog/') }}" alt="Image par défaut">
                            @endif
                            <div class="blog-date">
                                <a href="#"><i class="fa-regular fa-clock me-2"></i>{{ \Carbon\Carbon::parse($article->created_at)->locale('fr')->isoFormat('LLLL') }}</a>
                            </div>
                        </div>
                        <div class="blog-text courses-text text-center">
                            <a href="#" class="sys-title" title="">{{ $article->titre}}</a>
                            <p>{{ Str::limit($article->description, 150, '...') }}</p>
                            <a class="f-btn s-btn" href="#">Lire la suite</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- latest-blog-end -->
<!-- our-courses-start -->
<section class="our-courses-area section-bg pt-80 pb-60">
    <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-7">
              <div class="section-title mb-5">
                  <h2>Nos programmes</h2>
                  <div class="sevaider sec-left sevaider-sm"><i class="fa-solid fa-book-open-reader"></i></div>
                  <p>À l'Institut Supérieur de Technologie de Mamou (IST-Mamou), nous offrons une gamme diversifiée de programmes académiques conçus pour répondre aux besoins du marché du travail et aux aspirations professionnelles de nos étudiants. Nos programmes allient théorie et pratique, fournissant ainsi une éducation complète et équilibrée. </p>
              </div>
          </div>
          <div class="col-lg-6 col-md-5">
              <div class="view-all">
                  <a class="f-btn" href="courses-grid.html">Voir tous les programmes</a>
              </div>
          </div>
        </div>
        <div class="row">
            @foreach ($frontProgrammes as $frontProgramme)
                <div class="col-lg-4 col-md-6 mb-20">
                    <div class="single-courses">
                        <div class="courses-img">
                            <img class="img-fluid" src="{{ $frontProgramme->image_path ? asset('storage/' . $frontProgramme->image_path) : asset('assets/front/img/courses/2.jpg') }}" alt="Image du programme">
                            <div class="courses-content">
                                <span><i class="fa fa-graduation-cap me-2"></i>{{ $frontProgramme->type_programme }}</span>
                                <span><i class="fa-regular fa-calendar-days me-2"></i>{{ $frontProgramme->duree }}</span>
                            </div>
                            <div class="total-price">
                                <span><i class="fa fa-graduation-cap me-2"></i>{{ $frontProgramme->type_programme }}</span>
                                <span><i class="fa-regular fa-calendar-days me-2"></i>{{ $frontProgramme->duree }}</span>
                            </div>
                        </div>
                        <div class="courses-text">
                            <a href="#" class="courses-title" title="">{{ $frontProgramme->intitule_programme }}</a>
                            <p>{{ $frontProgramme->description }}</p>
                            <a class="f-btn s-btn" href="#">Lire la suite</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- our-courses-end -->
<!-- counter-area-start -->
<section class="counter-area counter-bg bg-overly pt-80 pb-60 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 mb-20">
                <div class="single-counter text-center">
                    <i class="fa-solid fa-people-roof"></i>
                    <span class="counter">80</span>
                    <h4>Enseignants</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mb-20">
                <div class="single-counter text-center">
                    <i class="fa-solid fa-flask-vial"></i>
                    <span class="counter">19</span>
                    <h4>EXPERIENCES</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mb-20">
                <div class="single-counter text-center">
                    <i class="fa-solid fa-children"></i>
                    <span class="counter">800</span>
                    <h4>étudiants</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mb-20">
                <div class="single-counter text-center">
                    <i class="fa-solid fa-book-open-reader"></i>
                    <span class="counter">7</span>
                    <h4>programmes</h4>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- counter-area-end -->
<!-- our-techer-area-start -->
<section class="techer-area pt-80 pb-60">
    <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-3">
              <div class="section-title text-center mb-5">
                  <h2>Nos Enseignants !</h2>
                  <div class="sevaider"><i class="fa-solid fa-book-open-reader"></i></div>
                  <p>À l'Institut Supérieur de Technologie de Mamou (IST-Mamou), nous sommes fiers de compter parmi nous une équipe d'enseignants hautement qualifiés et dévoués. Nos enseignants jouent un rôle crucial dans la formation de nos étudiants et dans la réalisation de notre mission éducative.</p>
              </div>
          </div>
        </div>
        <div class="row g-0">
            @foreach ($frontenseignants as $frontenseignant)
                <div class="col-lg-5 col-md-6 offset-lg-1 mb-20">
                    <div class="single-ticher">
                        <div class="single-img-techer">
                            <img class="img-fluid" src="{{ Storage::url($frontenseignant->image_path) }}" alt="">
                        </div>
                        <div class="teacher-social">
                            <ul>
                                <li><a href="mailto:{{ $frontenseignant->email }}"><i class="fa fa-envelope"></i></a></li>
                                <li><a href="tel:{{ $frontenseignant->tel }}"><i class="fa fa-phone"></i></a></li>
                                <li><a href="https://www.linkedin.com/{{ $frontenseignant->link_in }}" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                <li><a href="https://www.facebook.com/{{ $frontenseignant->link_fb }}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                            </ul>
                        </div>
                        <div class="intructor text-center">
                            <a href="#">{{ $frontenseignant->prenom }} {{ $frontenseignant->nom }}</a>
                            <h4>{{ $frontenseignant->cours }}</h4>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- our-techer-area-end -->
<!-- gellary-area-start -->
<section class="gellary-area section-bg pt-80 pb-60">
   <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-7">
              <div class="section-title mb-5">
                  <h2>Explorer notre Galérie d'images</h2>
                  <div class="sevaider sec-left sevaider-sm"><i class="fa-solid fa-book-open-reader"></i></div>
                  <p>Bienvenue dans la galerie de l'Institut Supérieur de Technologie de Mamou (IST-Mamou). Découvrez à travers nos photos et vidéos un aperçu de la vie à notre institut, de nos infrastructures modernes et de nos divers événements académiques et culturels.</p>
              </div>
          </div>
          <div class="col-lg-6 col-md-5">
              <div class="view-all">
                  <a class="f-btn" href="gallery.html">Voir toutes les images</a>
              </div>
          </div>
        </div>
       <div class="row no-gutters">
           @foreach ($photos as $photo)
            <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="gellary-wraper mb-20">
                        <div class="gallery">
                            <a href="{{ asset($photo->file_path) }}"><i class="fa-solid fa-eye"></i><img class="img-fluid" src="{{ asset($photo->file_path) }}" alt=""></a>
                            @foreach ($all_photos as $all_photo)
                                <a href="{{ asset($all_photo->file_path) }}"></a>
                            @endforeach
                        </div>
                    </div>
                </div>
           @endforeach
       </div>
   </div>
</section>
<!-- gellary-area-end -->
<!-- testimonial-area-start -->
<section class="testimonial-area ptb testimonial-bg bg-overly">
    <div class="container">
        <div class="col-lg-8 offset-lg-2">
            <div class="testimonial-wrapper owl-carousel">
                @foreach ($temoignages as $temoignage )
                    <div class="full-slide">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-5 col-sm-12">
                                <div class="testimonial-img">
                                    <a href="#"><img class="img-fluid" src="{{ $temoignage->image_path && str_contains($temoignage->image_path, 'image') ? asset('storage/' . $temoignage->image_path) : asset('assets/img/téléchargement.png') }}" alt=""></a>
                                    <i class="fa-solid fa-quote-right"></i>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12">
                                <div class="testimonial-content">
                                    <p>{{ $temoignage->texte }}</p>
                                    <h4>{{ $temoignage->prenom}} {{ $temoignage->nom }}</h4>
                                    <h5>{{ $temoignage->fonction }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- testimonial-area-end -->*
<!-- about-us-start -->
<section class="about-area pt-80 pb-60">
    <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-3">
              <div class="section-title mb-5 text-center">
                  <h2>Nos services</h2>
                  <div class="sevaider"><i class="fa-solid fa-book-open-reader"></i></div>
                  <p>Bienvenue à l'Institut Supérieur de Technologie de Mamou (IST-Mamou), une institution dédiée à l'excellence académique et à l'innovation technologique. Fondé avec la mission de former les leaders de demain, l'IST-Mamou est un pilier de l'éducation supérieure en Guinée, offrant une gamme de programmes et de formations adaptés aux besoins du marché du travail et aux aspirations de nos étudiants.</p>
              </div>
          </div>
        </div>
        <div class="row">
            @foreach ($frontservices as $frontservice)
                <div class="col-lg-4 col-md-6">
                    <div class="single-wrapper mb-20 border10 bg-overly">
                        <div class="uvb-img">
                            <img class="img-fluid" src="{{ $frontservice->image_path && str_contains($frontservice->image_path, 'image') ? asset('storage/' . $frontservice->image_path) : asset('assets/img/téléchargement.png') }}" alt="">
                        </div>
                        <div class="about-content">
                            <h4>{{ $frontservice->nomservice }}</h4>
                            <p>{{ $frontservice->texte }}</p>
                            <a class="f-btn" href="mailto:{{ $frontservice->email }}"><i class="fa fa-envelope me-2"></i>{{ $frontservice->email }}</a><br>
                            <a class="f-btn" href="tel:{{ $frontservice->tel }}"><i class="fa fa-phone me-2"></i>{{ $frontservice->tel }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- about-us-end -->
<!-- Subscribe Our Newsletter-area -->

<div class="Subscribe-area section-bg pt-30 pb-30">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-12">
                <div class="subscribe-content">
                    <i class="fa-regular fa-envelope"></i>
                    <span>S'inscrire à la Newsletter</span>
                </div>
            </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      </p>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 </p>
            <div class="col-lg-5 col-md-12">
                <div class="subscribe-form">
                    <form action="{{ route('subscribe') }}" method="POST">
                        @csrf
                        <input type="email" name="email" placeholder="entrer votre email" required>
                        <button class="f-btn" type="submit">S'inscrire</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                <div class="subscribe-social">
                    <ul>
                        <li><a href="#" title="rss"><i class="fa-solid fa-rss"></i></a></li>
                        <li><a href="#" title="facebook"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="#" title="twitter"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="#" title="linkedin"><i class="fa-brands fa-linkedin-in"></i></a></li>
                        <li><a href="#" title="instagram"><i class="fa-brands fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Subscribe Our Newsletter-end -->
</main>
<!-- footer-area-start -->
<footer class="footer-bg">
<section class="footer-area ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-8 md-mb-20">
                <div class="footer-about">
                    <a href="{{ route('front.accueil') }}"><img class="img-fluid" src="{{ asset('assets/front/img/logo/logo-7-entistmamou.png') }}" alt=""></a>
                    <p>On my way to where the air is  sweet. Can you tell me how to get how to get to Sesame Street! The first mate and his Skipper too will do their very best to make the others comfortable </p>
                    <ul>
                        <li><a href="#" title="facebook"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="#" title="twitter"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="#" title="linkedin"><i class="fa-brands fa-linkedin-in"></i></a></li>
                        <li><a href="#" title="instagram"><i class="fa-brands fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-4 md-mb-20">
                <div class="footer-link">
                    <h4>Liens internes</h4>
                    <ul>
                        <li><i class="fa-solid fa-angles-right"></i><a href="#" title="">Accueil</a></li>
                        <li><i class="fa-solid fa-angles-right"></i><a href="#" title="">Apropos de Nous</a></li>
                        <li><i class="fa-solid fa-angles-right"></i><a href="#" title="">Programmes</a></li>
                        <li><i class="fa-solid fa-angles-right"></i><a href="#" title="">Enseignants</a></li>
                        <li><i class="fa-solid fa-angles-right"></i><a href="#" title="">Contactez-Nous</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 md-mb-20">
                <div class="footer-tweets">
                    <h4>Liens utiles</h4>
                    <div class="tweets-icon">
                        <i class="fa fa-university"></i>
                    </div>
                    <div class="tweets-text mb-15">
                        <p><a href="#">MESRSI</a> | Ministère de l'Enseignement Supérieur de la Recherche Scientifique et de l'Innovation. </p>
                    </div>
                </div>
                <div class="footer-tweets">
                    <div class="tweets-icon">
                        <i class="fa fa-university"></i>
                    </div>
                    <div class="tweets-text">
                        <p><a href="#">METFPE</a> | Ministère de l'Enseignement Technique de la Formation Professionnelle et de l'Emploi. </p>
                    </div>
                </div>
                <div class="footer-tweets">
                    <div class="tweets-icon">
                        <i class="fa fa-university"></i>
                    </div>
                    <div class="tweets-text">
                        <p><a href="#">MTFP</a> | Ministère du Travail et de la Fonction Publique. </p>
                    </div>
                </div>
                <div class="footer-tweets">
                    <div class="tweets-icon">
                        <i class="fa fa-university"></i>
                    </div>
                    <div class="tweets-text">
                        <p><a href="#">MJS</a> | Ministère de la Jeunesse et du Sport. </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="contact-info">
                    <h4>Adresse</h4>
                    <div class="footer-tweets">
                        <div class="tweets-icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div class="tweets-text mb-15">
                            <p><a href="#">IST-Mamou</a> | BP: 63, Télico, Mamou, Guinée </p>
                        </div>
                    </div>
                    <div class="footer-tweets">
                        <div class="tweets-icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div class="tweets-text mb">
                            <p><a href="#"></a>+224 627 99 72 35</p>
                        </div>
                    </div>
                    <div class="footer-tweets">
                        <div class="tweets-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="tweets-text">
                            <p><a href="#">istmamou@gmail.com</a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- copyright-area-start -->
<div class="copy-area pt-30 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="copy-text text-center">
                    <p>© Copyright ENT IST-Mamou. Tous droits reservés.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- copyright-area-end-->
</footer>
<!-- footer-area-end -->

<!-- JS here -->
<script src="{{ asset('assets/front/js/vendor/modernizr-3.5.0.min.js') }}"></script>
<script src="{{ asset('assets/front/js/vendor/jquery-3.6.3.min.js') }}"></script>
<script src="{{ asset('assets/front/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/front/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/front/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/front/js/countdown.js') }}"></script>
<script src="{{ asset('assets/front/js/mobile-menu.js') }}"></script>
<script src="{{ asset('assets/front/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/front/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/front/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/front/js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('assets/front/js/plugins.js') }}"></script>
<script src="{{ asset('assets/front/js/main.js') }}"></script>

</body>

<!-- Mirrored from preetheme.com/rana/skill-full-demo/main-file/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Nov 2023 12:44:32 GMT -->
</html>
