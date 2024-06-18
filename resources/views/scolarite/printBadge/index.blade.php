@extends('thd-layouts.my')

@section('content')

<style>
   .carte { 
        overflow-x: hidden;
        overflow-y: hidden;
        background: linear-gradient(to left, rgb(228, 227, 227), rgba(246, 244, 244, 0.9)), url({{asset('assets/img/ist2.png')}}) center / cover no-repeat;  
        /* background: linear-gradient(to left, rgba(199, 94, 94, 0.9), rgba(255, 255, 255, 0.9)), url({{asset('backend/assets/img/ist3.png')}}) center / cover no-repeat;   */
    }
    @media print {
        .carte {
            overflow-x: hidden;
            overflow-y: hidden;
            background: linear-gradient(to left, rgba(228, 227, 227), rgba(246, 244, 244, 0.9)), url({{asset('assets/img/ist2.png')}}) center / cover no-repeat !important;
            -webkit-print-color-adjust: exact; 
        }
    }
    /*  */
</style>
    @foreach($etudiants as $etudiant)
        <div class="container my-4">
            <div class="row px-0">
                <div class="card col-sm-11 col-md-11 col-lg-6 p-0 carte text-dark" >
                    <div class="card-body border border-2 p-0">
                        <div class="pt-0 row px-2">
                            <div class="col-3 d-flex justify-content-center mt-1">
                                <img width="40px" height="40px" src="{{asset('assets/img/ist.jpg') }}" alt="">
                            </div>
                            <div class="col-9 px-1">
                                <div class="d-flex flex-column text-center">
                                    <h8 class="bg-primary text-white ist px-2 p-1 fw-bold mb-0">INSTITUT SUPERIEUR DE TECHONOLOGIE DE MAMOU</h8>
                                    <span class="devise mt-0">
                                        <b class="text-danger">Intégrité - </b><b class="text-warning" >Rugureur - </b><b class="text-success">Compétance</b>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center text-danger fw-bold fs-5 my-1">
                            <samp>CARTE D'ETUDIANT.E</samp>
                        </div>
                        <div class="d-flex flex-row gap-2 info align-items-center justify-content-center px-2">
                            <div class="d-flex flex-column justify-content-center">
                                <span class="bg-primary text-center text-white fw-bold py-1 mb-1 photo">PHOTO</span>
                                <img width="95px" src="{{asset('storage/'.$etudiant->photo) }}" alt="PHOTO">
                            </div>
                            <div class=" d-flex flex-column p-1">
                                <b>{{ $etudiant->ine }} </b>
                                <b>{{ $etudiant->nom }} </b>
                                <b>{{ $etudiant->prenom }} </b>
                                <b>Né(e) le : {{$etudiant->telephone}} A {{$etudiant->adresse}} </b>
                                <b>De : {{ $etudiant->pere }} </b>
                                <b>Et de : {{ $etudiant->mere }} </b>
                                <b>{{ $etudiant->prenom }} / {{ $etudiant->nom }} </b>
                            </div>
                            <div class="text-center">
                                <div class="d-flex flex-column justify-content-center">
                                    <div id="qrcode_{{ $etudiant->id }}" style="width: 80px; height: 80px; margin-top: 15px;"></div>
                                </div>

                                <script type="text/javascript">
                                    var qrcode = new QRCode(document.getElementById("qrcode_{{ $etudiant->id }}"), {
                                        width: 90,
                                        height: 90,
                                    });
                                
                                    var matricule = "{{ $etudiant->ine }}";
                                    var nom = "{{ $etudiant->nom }}";
                                    var prenom = "{{ $etudiant->prenom }}";
                                
                                    var texteQR = "Matricule: " + matricule + "\nNom: " + nom + "\nPrénom: " + prenom;
                                
                                    qrcode.makeCode(texteQR);
                                </script>
                            </div>
                        </div>
                        <div class="">
                            <div class="d-flex flex-column justify-content-center bg-primary text-white text-center link py-1">
                                <b class="text-white ist">www.istmamou.org</b>
                                <b>Téléphone : +224 628620724</b>
                            </div>
                            <div class="bg-danger p-1 contact-div"></div>
                        </div>
                    </div>
                </div>
                
                <div class="card col-sm-11 col-md-11 col-lg-6 carte border border-2 text-dark">
                    @foreach ($services as $service)
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        @if ($service->sigle === "SC" || $service->nomservice =="Service Scolarite")
                            <h6 class="mb-5 fw-bold">{{$service->fonction}}</h6>
                            <strong class="mt-5">{{$service->nom}} </strong>                        
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        
            <script>
                window.onload = function() {
                    window.print();
                }
            </script>
        </div>
    @endforeach

@endsection

