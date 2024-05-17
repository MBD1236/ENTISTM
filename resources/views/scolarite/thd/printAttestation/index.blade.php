@extends('layouts.my')

@section('content')


<style>
    .carte { 
         overflow-x: hidden;
         overflow-y: hidden;
         background: linear-gradient(to left, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0.9)), url({{asset('backend/assets/img/ist2.png')}}) center / cover no-repeat;  
         /* background: linear-gradient(to left, rgba(199, 94, 94, 0.9), rgba(255, 255, 255, 0.9)), url({{asset('backend/assets/img/ist3.png')}}) center / cover no-repeat;   */
     }
 </style>

@foreach($inscriptions as $inscription)
    <div class="container border border-5 border-primary my-5">
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
                    <img width="70px" height="70px" src="{{asset('backend/assets/img/ist.jpg') }}" alt="">
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
                <span>N° Ref : 0000 / ISTM /<span class="fw-bold">
                    @foreach ($services as $service)
                        @if ($service->sigle === 'SC' || $service->nomservice === 'Service Scolarite')
                            {{$service->sigle}}
                        @endif
                    @endforeach
                </span>/<script>document.write(new Date().getFullYear()-2000) </script></span>
                <span>Mamou, le 
                    <script>document.write(new Date().getDate())</script>/
                    <script>document.write(new Date().getMonth())</script>/ 
                    <script>document.write(new Date().getFullYear())</script>
                </span>
            </div>
            <div class="row text-center mb-2 ">
                @foreach ($inscriptions as $inscription)
                    @foreach ($niveaux as $item)
                        @if ($item->id === $inscription->niveau_id && $inscription->inscription_id === $inscription->id)
                            @dump($item->niveau)
                        @endif
                    @endforeach
                    
                @endforeach
                <h5 class="text-uppercase fw-bold fs-4">Attestation d'inscription</h5>
                {{-- <h5 class="text-uppercase fw-bold">Attestation de reinscription</h5> --}}
            </div>
            <div class="row">
                <p class="contenu">
                    Je soussigné 
                    @foreach ($services as $service)
                        @if ($service->sigle === 'SC' || $service->nomservice === 'Service Scolarite')
                           {{$service->nom}} , {{$service->fonction}}
                        @endif
                    @endforeach
                    de L'Institut Supérieur de Technologie de Mamou, atteste que l'étudiant.e : <strong class="text-uppercase">{{$inscription->etudiant->prenom}} {{$inscription->etudiant->nom}} </strong>, 
                    Matricule : <b>{{$inscription->etudiant->ine}} </b> a été insctit.e aux <b>Semestres S7 et S8</b>(4 <sup>ème</sup> Année) du Département <b>{{$inscription->etudiant->programme}}</b> au compte de l'année universitaire 
                    <b>
                        @foreach ($annee_universitaires as $annee_universitaire)  
                            {{-- @if ($inscription->annee_universitaire_id === $annee_universitaire->id) --}}
                            {{$inscription->annee_universitaire->annee_universitaire}}   
                            {{-- @endif --}}
                            {{-- @dd($inscription->annee_universitaire) --}}
                        @endforeach
                        
                    </b>
                </p>
                <p class="mb-5">En fois de quoi, la présente attestation lui est délivrée pour servir et valoir ce que de droit.</p>    
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
                <i class="fw-bold attestion-footer">Cette attestation ne doit contenir ni rature, ni surcharge</i>
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


