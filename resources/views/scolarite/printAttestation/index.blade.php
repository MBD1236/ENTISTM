@extends('thd-layouts.my')

@section('content')

<style>
    .attesta { 
         overflow-x: hidden;
         overflow-y: hidden;
         background: linear-gradient(to left, rgb(255, 255, 255, 0.9), rgba(255, 255, 255, 0.8)), url({{asset('assets/img/ist2.png')}}) center / cover no-repeat;  
         /* background: linear-gradient(to left, rgba(199, 94, 94, 0.9), rgba(255, 255, 255, 0.9)), url({{asset('backend/assets/img/ist3.png')}}) center / cover no-repeat;   */
     }
 </style>

@foreach($attestations as $attestation)
    <div class="container border border-5 border-primary my-5 text-dark attesta ">
        <div class="container-fluid border border-5 border-primary pt-3 my-2">
            <div class="row text-center">
                <h6 class="fw-bold mb-0">REPUBLIQUE DE GUINEE</h6>
                <span class="devise mt-0">
                    <b class="text-danger">Travail - </b><b class="text-warning" >Justice - </b><b class="text-success">Solidarité</b>
                </span>
            </div>
            <div class="row text-center mt-2">
                <h6 class="mesrsi text-uppercase mb-1">Ministere de l'enseignement superieur de la recherche scientifique et de l'innovation</h6>
                <h6 class="mesrsi text-uppercase">Direction nationale de l'enseignement superieur public</h6>
            </div>
                
            <div class="row">
                <div class="col-1">
                    <img width="70px" height="70px" src="{{asset('assets/img/ist.jpg') }}" alt="">
                </div>
                <div class="col-11 d-flex flex-column gap-3 text-center">
                    <h5 class="text-uppercase fw-bold me-5">institut superieur de technologie de mamou</h5>
                    @foreach ($services as $service)
                        @if ($service->sigle === 'SC' || $service->nomservice === 'Service Scolarite')
                            <h5 class="text-uppercase fw-bold scolarite">{{$service->nomservice}} </h5>  
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="row fw-bold mt-1 mb-0">
                <div class="col-3 text-start"><span>BT : 63 Mamou</span></div>
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
            <div class="row px-2"><hr></div>
            <div class="d-flex flex-row justify-content-between ref">
                <span>N° Ref : 
                    {{ $attestation->reff }}  /ISTM/SC/{{ date('y') }}</span>
                <span>Mamou, le <span class="dateAffichee"></span></span>
                <script>
                    document.querySelectorAll('.dateAffichee').forEach(function(element) {
                        element.textContent = afficherDate();
                    });
                </script>
            </div>
            <div class="row text-center mb-2 ">
                <h5 class="text-uppercase fw-bold fs-4">Attestation 
                    @if ($attestations->first()->attestation_type->type == "inscription")
                        d'{{$attestations->first()->attestation_type->type}}
                    @else
                        de {{$attestations->first()->attestation_type->type}}
                    @endif
                </h5>
            </div>
            <div class="row">
                <p class="contenu">
                    Je soussigné 
                    @foreach ($services as $service)
                        @if ($service->sigle === 'SC' || $service->nomservice === 'Service Scolarite')
                        {{$service->nom}} , {{$service->fonction}}
                        @endif
                    @endforeach
                    de L'Institut Supérieur de Technologie de Mamou, atteste que l'étudiant.e : <strong class="text-uppercase">{{$attestation->etudiant->prenom}} {{$attestation->etudiant->nom}} </strong>, 
                    Matricule : <b>{{$attestation->etudiant->ine}} </b> a été insctit.e aux
                        <span class="afficherSemestre fw-bold">
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const niveau = "{{ $attestation->niveau->niveau }}";
                                    document.querySelectorAll('.afficherSemestre').forEach(function(element) {
                                        element.textContent = afficherSemestre(niveau);
                                    });
                                });
                            </script>    
                        </span>
                    </span> du Département <b>{{$attestation->etudiant->programme}}</b> au compte de l'année universitaire                             
                    <b>
                        {{$attestations->first()->annee_universitaire->session}} 
                    </b>
                </p>
                <p class="mb-5">En fois de quoi, la présente etudiant lui est délivrée pour servir et valoir ce que de droit.</p>    
            </div>
            <div class="row pt-1 pb-5">
                <div class="col-7"></div>
                <div class="col-5 d-flex flex-column justify-content-center text-center">
                    <span class="fw-bold mb-3 ">
                        @foreach ($services as $service)
                            @if ($service->sigle === 'SC' || $service->nomservice === 'Service Scolarite')
                                {{$service->fonction}}
                            @endif
                        @endforeach
                    </span>
                    <span class="mt-5">
                        @foreach ($services as $service)
                            @if ($service->sigle === 'SC' || $service->nomservice === 'Service Scolarite')
                                {{$service->nom}}
                            @endif
                        @endforeach
                    </span>
                </div>  
            </div>
            <div class="row text-center mb-1">
                <i class="fw-bold attestion-footer">Cette etudiant ne doit contenir ni rature, ni surcharge</i>
            </div>
            
            {{-- <script>
                window.onload = function() {
                    window.print();
                }
            </script> --}}
        
        </div>   
    </div>
@endforeach

@endsection
