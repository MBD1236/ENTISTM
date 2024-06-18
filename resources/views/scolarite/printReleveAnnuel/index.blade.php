@extends('thd-layouts.my')

@section('content')

<style>
    .releve { 
        overflow-x: hidden;
        overflow-y: hidden;
        background: linear-gradient(to left, rgba(246, 249, 255, 0.9), rgba(246, 249, 255, 0.7)), url({{asset('assets/img/ist2.png')}}) center / cover no-repeat;  
     }

    @media print {
        .releve {
            overflow-x: hidden;
            overflow-y: hidden;
            background: linear-gradient(to left, rgba(246, 249, 255, 0.9), rgba(246, 249, 255, 0.7)), url({{asset('assets/img/ist2.png')}}) center / cover no-repeat !important;
            -webkit-print-color-adjust: exact; 
        }
    }
   
    .table {
        border-collapse: collapse;
        width: 100%;
    }

    .table th, .table td {
        border: 0.1em solid black; 
        padding: 4px; 
    }

    .table th {
        text-align: center;
        background-color: #fefefe; 
    }

    .table thead {
        background-color: #f6f9ff; 
    }

    .bottom-line {
        position: fixed;
        bottom: 18px;
        left: 0;
        width: 100%;
    }

    /*  */
</style>
<div class="container d-flex flex-column gap-6 mb-5">
    <div class="releve text-dark mt-5 px-4">
        <div class="row d-flex align-items-center">
            <div class="col-md-4 d-flex flex-column align-items-center fw-bold" style="font-size: 13px">
                <p class="text-center fw-bold">INSTITUT SUPERIEUR <br> DE TECHNOLOGIE DE MAMOU</p>
                <p class="ms-4" style="border-top:.2em dashed #120a5c; width:160px"></p>
                <p class="text-center mt-3 fw-bold">SERVICE : SCOLARITE</p>
            </div>
            <div class="col-md-3 d-flex flex-column align-items-end">
                <img src="{{asset('assets/img/logo-ent-trans.png')}}" width="120px" height="120px" alt="IST-LOGO" srcset="">
            </div>
            <div class="col-md-5 d-flex flex-column align-items-center">
                <h6 class="fw-bold mb-0">REPUBLIQUE DE GUINEE</h6>
                <span class="devise mt-0">
                    <b class="text-danger">Travail - </b><b class="text-warning">Justice - </b><b class="text-success">Solidarité</b>
                </span>
                <p class="my-3" style="border-top:.1em dashed  #120a5c; width:150px"></p>
                <p style="font-size: 10px" class="text-center fw-bold">Ministere de l'Enseignement Supérieur de la <br> Recherche Scientifique et de l'Innovation <br>(M.E.S.R.I)</p>
            </div>
        </div>
        <div>
            <div class="row fw-bold mt-1 mb-0">
                <div class="col-3 text-start"><span>BT: 63 Mamou</span></div>
                <div class="col-6 text-center">
                    <span>Email : 
                        @foreach ($services as $service)
                            @if ($service->sigle === 'SC' || $service->nomservice === 'Service Scolarite')
                                {{$service->email}}
                            @endif
                        @endforeach
                    </span>
                </div>
                <div class="col-3 text-end">Tél :
                    @foreach ($services as $service)
                        @if ($service->sigle === 'SC' || $service->nomservice === 'Service Scolarite')
                            {{$service->telephone}}
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="row mx-0 my-1" style="border: 1.8px solid #120a5c"></div>
            <div class="d-flex flex-row justify-content-between fw-bold">
                <span>N° Ref : {{$numeroreference->numero}}/ISTM/SC/{{ date('y') }}</span>
                <span>Mamou, le <span class="dateAffichee"></span></span>
                <script>
                    document.querySelectorAll('.dateAffichee').forEach(function(element) {
                        element.textContent = new Date().toLocaleDateString('fr-FR');
                    });
                </script>
            </div>
            <div class="row d-flex flex-row justify-content-center fw-bold fs-3">RELEVE DE NOTES</div>
            <div class="row my-2 mx-2">
                <div class="col-md-8 d-flex flex-column">
                    @foreach ($etudiants as $e)
                        <span class="my-1">Prénom et Nom :&nbsp;&nbsp;&nbsp;  <span class="fw-bold">{{$e->etudiant->prenom}} {{$e->etudiant->nom}}</span></span>
                        <span class="my-1">Matricule :&nbsp;&nbsp;&nbsp;  <span class="fw-bold">{{$e->etudiant->ine}}</span></span>
                        <span class="my-1">Département :&nbsp;&nbsp;&nbsp;  <span class="fw-bold">{{$e->programme->departement->departement}}</span></span>
                        <span class="my-1">Programme :&nbsp;&nbsp;&nbsp;  <span class="fw-bold">{{$e->programme->programme}}</span></span>
                        <span class="my-1">Année Universitaire :&nbsp;&nbsp;&nbsp;  <span class="fw-bold">{{$e->annee_universitaire->session}}</span></span>
                    @endforeach
                </div>
                <div class="col-md-4 d-flex flex-column align-items-center">
                    @foreach ($etudiants as $e)
                    <div class="text-center">
                        <div class="d-flex flex-column justify-content-center">
                            <div id="qrcode_{{ $e->etudiant->id }}" style="width: 100px; height: 100px; margin-top: 15px;"></div>
                        </div>
                
                        <script type="text/javascript">
                            var qrcode = new QRCode(document.getElementById("qrcode_{{ $e->etudiant->id }}"), {
                                width: 110,
                                height: 110,
                            });
                        
                            var matricule = "{{ $e->etudiant->ine }}";
                            var nom = "{{ $e->etudiant->nom }}";
                            var prenom = "{{ $e->etudiant->prenom }}";
                            var programme = "{{$e->etudiant->programme}}"

                            var texteQR = "Matricule: " + matricule + "\nNom: " + nom + "\nPrénom: " + prenom
                            + "\nProgramme: " + programme;
                           
                            qrcode.makeCode(texteQR);
                        </script>
                    </div>
                    @endforeach
                    <p class="my-3">Niveau : 
                        <span class="fw-bold">
                            @foreach($semestre as $k => $s)
                                @php
                                    $words = explode(' ', $s->semestre);
                                    $shortenedSemester = '';
                                    foreach ($words as $word) {
                                        $shortenedSemester .= strtoupper(substr($word, 0, 1));
                                    }
                                    echo $shortenedSemester;
                                @endphp
                                @if($k < $semestre->count() - 1) & @endif
                            @endforeach
                        </span>
                    </p>
                </div>
            </div>
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th rowspan="2">N°</th>
                        <th rowspan="2">MATIERES</th>
                        <th colspan="2">Notations</th>
                        <th rowspan="2">Observation</th>
                    </tr>
                    <tr>
                        <th>Chiffrées</th>
                        <th>Littéraires</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        function noteLiteraire($note) {
                            if ($note >= 9) return 'A+';
                            elseif ($note >= 8) return 'B+';
                            elseif ($note >= 7) return 'C+';
                            elseif ($note >= 6) return 'D+';
                            else return 'E+';
                        }

                        $totalNotes = 0;
                        $totalMatieres = 0;
                    @endphp

                    @foreach($etudiants as $etudiant)
                        @foreach ($matieres as $k => $mat)
                            @php
                                $notem = $notes->where('inscription_id', $etudiant->id)
                                               ->where('matiere_id', $mat->id)
                                               ->pluck('moyenne_generale')->first();
                                if($notem !== null) {
                                    $totalNotes += $notem;
                                    $totalMatieres++;
                                }
                            @endphp
                            <tr>
                                <th>{{ $k+1 }}</th>
                                <th class="text-start">{{ $mat->matiere }}</th>
                                <th>{{ $notem }}</th>
                                <th>{{ noteLiteraire($notem) }}</th>
                                <th></th>
                            </tr>
                        @endforeach
                    @endforeach 
                </tbody>
            </table>

            @php
                $ms = $totalMatieres > 0 ? $totalNotes / $totalMatieres : 0;
                $appreciation = '';

                if ($ms >= 8) {
                    $appreciation = 'Très bon resultat univsersitaire, très bon.ne étudiant.e';
                } elseif ($ms >= 7) {
                    $appreciation = 'Bon resultat univsersitaire, bon.ne étudiant.e';
                } elseif ($ms >= 6) {
                    $appreciation = 'Assez bon resultat univsersitaire, assez bon.ne étudiant.e';
                } elseif ($ms >= 5) {
                    $appreciation = 'Passable';
                } else {
                    $appreciation = 'Insuffisant';
                }
            @endphp

            <div class="row">
                <p class="py-0">Moyenne Semestrielle : <span class="fw-bold">{{ number_format($ms, 2) }}/10</span></p>
                <p class="py-0">Appréciation : <span class="fw-bold">{{ $appreciation }}</span></p>
            </div>

            <div class="row mt-3">
                <div class="col-6"></div>
                <div class="col-6 text-center">
                    @foreach ($services as $service)
                        @if ($service->sigle === 'SC' || $service->nomservice === 'Service Scolarite')
                            <p class="fw-bold mb-5">{{$service->fonction}} </p>
                            <p class="mt-5 mb-5">{{$service->nom}} </p>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="bottom-line">
                <div class="row mx-5 my-1 mt-5" style="border: 1.8px solid #120a5c"></div>
                <div class="row mb-t text-center fw-bold"><span style="font-size: 10px">Ce relevé ne doit comporter ni surcharge ni rature</span></div>
            </div>
        </div>
    </div>
    
    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</div>
@endsection
