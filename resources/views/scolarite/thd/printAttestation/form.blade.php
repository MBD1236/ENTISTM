@extends('layouts.my')

@section('content')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Lorsque le premier formulaire est soumis
        document.getElementById('form1').addEventListener('submit', function (event) {
            event.preventDefault(); // Empêche le formulaire d'être soumis normalement
            var formData = new FormData(this); // Crée un objet FormData avec les données du formulaire

            // Envoie une requête AJAX à la route 'fetch.students' avec les données du formulaire
            fetch(this.action, {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                // Affiche le deuxième formulaire
                document.getElementById('form2').style.display = 'block';
                
                // Remplace le contenu de la liste de matricules avec les données récupérées
                var selectMatricules = document.getElementById('matricules');
                selectMatricules.innerHTML = ''; // Efface les anciennes options
                data.matricules.forEach(matricule => {
                    var option = document.createElement('option');
                    option.value = matricule.etudiant_id;
                    option.textContent = matricule.ine + ' - ' + matricule.prenom + ' ' + matricule.nom;
                    selectMatricules.appendChild(option);
                });
            })
            .catch(error => console.error('Erreur:', error));
        });
    });
</script>

<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Sélectionner le programme et l'annee</div>

                {{-- selectionner le programme et l'annee universitaire --}}
                <div class="card-body">
                    <form id="form1" action="{{ route('fetch.students') }}" method="POST">
                        @csrf
                    
                        <div class="form-group row">                       

                            <div class="col-md-6">
                                <select id="programme_id" class="select2 js-states form-control @error('programme_id') is-invalid @enderror" name="programme_id">
                                    <option value="">Sélectionner le.s programme.s</option>
                                    @foreach($programmes as $programme)
                                        <option  value="{{$programme->id}}" class="pb-1">{{ $programme->programme}}</option>
                                    @endforeach
                                </select>
                                @error('programme_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <select id="annee_id" class="select2 js-states form-control @error('annee_id') is-invalid @enderror" name="annee_id">
                                    <option value="">Sélectionner la(es) annee.s</option>
                                    @foreach($annee_universitaires as $annee_universitaire)
                                        <option  value="{{$annee_universitaire->id}}" class="pb-1">{{ $annee_universitaire->annee_universitaire}}</option>
                                    @endforeach
                                </select>
                                @error('annee_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 mt-3">
                                <button type="submit" class="btn btn-primary">
                                    selectionner le.s matricules de.s étudiant.es
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- selecitonner les matricules --}}
                <div class="card-body mt-3">
                    {{-- <form method="POST" action="{{ route('printAttestation') }}"> --}}
                    <form id="form2" action="{{ route('printAttestation') }}" method="POST" style="display: none;">
                        @csrf
                    
                        <div class="form-group row">                        
                            <div class="col-md-8 m-auto">
                                <select id="matricules" class="select2 js-states form-control @error('matricules') is-invalid @enderror" name="matricules[]" multiple>
                                    <option value="" class="my-2">Sélectionner le.s matricule.s</option>
                                    @foreach($inscriptions as $inscription)
                                        <option  value="{{$inscription->etudiant_id}}" class="pb-1">{{ $inscription->etudiant->ine}}  - {{ $inscription->etudiant->prenom}} {{ $inscription->etudiant->nom}}</option>
                                    @endforeach
                                </select>
                                @error('matricules')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 mt-3">
                                <button type="submit" class="btn btn-primary">
                                    Imprimer attestation
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

  
@endsection
