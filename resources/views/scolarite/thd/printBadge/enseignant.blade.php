@extends('layouts.my')

@section('content')

<style>
   .carte { 
        overflow-x: hidden;
        overflow-y: hidden;
        background: linear-gradient(to left, rgb(253, 253, 253), rgba(255, 255, 255, 0.9)), url({{asset('backend/assets/img/ist2.png')}}) center / cover no-repeat;  
        /* background: linear-gradient(to left, rgba(199, 94, 94, 0.9), rgba(255, 255, 255, 0.9)), url({{asset('backend/assets/img/ist3.png')}}) center / cover no-repeat;   */
    }
</style>
    @foreach($enseignants as $enseignant)
        <div class="cotainer">
            <div class="row px-0">
                <div class="card col-sm-11 col-md-11 col-lg-6 p-0 carte" >
                    <div class="card-body border border-2 p-0">
                        <div class="pt-0 row px-2">
                            <div class="col-3 d-flex justify-content-center mt-1">
                                <img width="40px" height="40px" src="{{asset('backend/assets/img/ist.jpg') }}" alt="">
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
                                <img width="95px" src="{{asset('storage/'.$enseignant->photo) }}" alt="PHOTO">
                            </div>
                            <div class=" d-flex flex-column p-1">
                                <b>{{ $enseignant->matricule }} </b>
                                <b>{{ $enseignant->nom }} </b>
                                <b>{{ $enseignant->prenom }} </b>
                                <b>Né(e) le : {{$enseignant->telephone}} A {{$enseignant->adresse}} </b>
                                <b>De : {{ $enseignant->prenom }} </b>
                                <b>Et de : {{ $enseignant->prenom }} </b>
                                <b>{{ $enseignant->prenom }} / {{ $enseignant->nom }} </b>
                            </div>
                            <div class="text-center">
                                <div class="d-flex flex-column justify-content-center">
                                    <div id="qrcode_{{ $enseignant->id }}" style="width: 100px; height: 100px; margin-top: 15px;"></div>
                                </div>

                                <script type="text/javascript">
                                    var qrcode = new QRCode(document.getElementById("qrcode_{{ $enseignant->id }}"), {
                                        width: 100,
                                        height: 100,
                                    });
                                
                                    var matricule = "{{ $enseignant->matricule }}";
                                    var nom = "{{ $enseignant->nom }}";
                                    var prenom = "{{ $enseignant->prenom }}";
                                
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
            
                <div class="card col-sm-11 col-md-11 col-lg-6 carte border border-2">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <h6 class="mb-5 fw-bold">Le Chef Services de la Scolarité</h6>
                        <strong class="mt-5">Mr Lanciné 2 CONDE</strong>                        
                    </div>
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

