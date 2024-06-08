@extends('thd-layouts.my')

@section('content')

<style>
   .recu { 
        overflow-x: hidden;
        overflow-y: hidden;
        background: linear-gradient(to left, rgb(228, 227, 227), rgba(246, 244, 244, 0.9)), url({{asset('assets/img/ist2.png')}}) center / cover no-repeat;  
        /*  */
    }
</style>

    <div class="recu d-flex flex-column gap-1">
        <div class="container text-dark" style="border:1px solid #120a5c;">
            <div class="row">
                <div class="col-md-2" style="border-right:.1em solid #120a5c;">
                    <div class="row mt-3">
                        <span>N°<span class="fs-5 fw-bold"> &nbsp;{{$recu->numerorecu }} </span> </span>
                        <span>Date <span class="fw-bold">&nbsp; {{$recu->created_at->format('d/m/Y') }} </span></span>
                        <span>Série <span class="fs-5 fw-bold">&nbsp; {{$recu->serie }}</span> </span>
                    </div>
                    <div class="row my-2 text-center" style="border-top:.1em solid #120a5c;">
                        <p class="fst-italic mt-2">Nom et Signature</p>
                    </div>
                </div>
                <div class="col-md-9 border border-2">
                    <div class="mt-4 mb-4">
                        <p class="pp">
                            Réçu de M/Mme<span class="fw-bold"> &nbsp;{{$recu->etudiant->prenom}} {{$recu->etudiant->nom}}</span> 
                            , Matricule : <span class="fw-bold"> &nbsp;{{$recu->etudiant->ine}}</span>
                        </p>
                        <p class="p ">
                            de la<span class="fw-bold"> &nbsp;{{$recu->promotion->promotion}}</span>
                            et du Département : <span class="fw-bold"> &nbsp; {{$recu->departement->departement}}</span>
                        </p>
                        {{-- Science des Conceptions et Fabrications Mécaniques --}}
                        <p class="pp"><span>La somme de : (en toute lettres) <span class="fw-bold"> &nbsp; {{$recu->somme}} </span></span></p>
                        <p class="pp"><span>Nature du Recette : <span class="fw-bold"> &nbsp; {{$recu->natureRecu->nature}} </span></span></p>
                        <p class="pp"><span>Référence Titre de Recette <span class="fw-bold"> &nbsp; (Optionnel)</span></span></p>
                        <p class="pp"><span>Mode de règlement : <span class="fw-bold"> &nbsp; {{ $recu->modereglement }} </span></span></p>
                    </div>
                </div>
                <div class="col-md-1" style="border-left:.1em solid #120a5c;">

                </div>
            </div>
        </div>   
    </div>
    <script>
        window.onload = function() {
            window.print();
        }
    </script>

@endsection