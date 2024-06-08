@extends('layouts.template-front-office-back')
@section('content')
    <div class="pagetitle">
    <h1>{{ __('Dashboard') }}</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('front.admin') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Dashboard') }}</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
        <div class="row">

            <!-- Articles Card -->
            <div class="col-xxl-3 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Articles</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="fa fa-book"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $nombre_article }}</h6>
                        </div>
                    </div>
                </div>
            </div>
            </div><!-- End Articles Card -->

            <!-- Galéries Card -->
            <div class="col-xxl-3 col-md-6">
            <div class="card info-card revenue-card">
                <div class="card-body">
                    <h5 class="card-title">Album</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="fa fa-photo"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $nombre_photo }}</h6>
                        </div>
                    </div>
                </div>
            </div>
            </div><!-- End Galéries Card -->

            <!-- Alumni Card -->
            <div class="col-xxl-3 col-xl-12">

            <div class="card info-card customers-card">
                <div class="card-body">
                    <h5 class="card-title">Abonnés</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $nombre_abonne }}</h6>
                        </div>
                    </div>
                </div>
            </div>

            </div><!-- End Alumni Card -->

            <!-- Témoignages Card -->
            <div class="col-xxl-3 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Témoignages</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="fa fa-comment"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $nombre_temoignage }}</h6>
                        </div>
                    </div>
                </div>
            </div>
            </div><!-- End Témoignages Card -->

            <!-- Statistiques -->
            <div class="col-12">
            <div class="card">

                <div class="card-body">
                <h5 class="card-title">Statistiques</h5>

                <!-- Line Chart -->
                <div id="reportsChart"></div>

                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                        name: 'abonnés',
                        data: [31, 40, 28, 51, 42, 82, 56],
                        }, {
                        name: 'Témoignage',
                        data: [11, 32, 45, 32, 34, 52, 41]
                        }, {
                        name: 'Galérie',
                        data: [15, 11, 32, 18, 9, 24, 11]
                        }],
                        chart: {
                        height: 350,
                        type: 'area',
                        toolbar: {
                            show: false
                        },
                        },
                        markers: {
                        size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                        fill: {
                        type: "gradient",
                        gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                        }
                        },
                        dataLabels: {
                        enabled: false
                        },
                        stroke: {
                        curve: 'smooth',
                        width: 2
                        },
                        xaxis: {
                        type: 'datetime',
                        categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                        },
                        tooltip: {
                        x: {
                            format: 'dd/MM/yy HH:mm'
                        },
                        }
                    }).render();
                    });
                </script>
                <!-- End Line Chart -->

                </div>

            </div>
            </div><!-- End Statistiques -->
        </div>
        </div><!-- End Left side columns -->
    </div>
    </section>
@endsection
