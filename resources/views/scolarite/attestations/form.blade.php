@extends('layouts.template-scolarite')

@section('title', $attestation->exists ? "Modification d'une attestation" : "Enregistremet d'une nouvelle attestation")
@section('content')
    <div class="card">
        <div class="card-header card-head">
            <h2 class="bg-card text-white card-head d-flex flex-row justify-content-center">
                <div> 
                    @if ($attestation->exists)
                        <i class="fa fa-pencil-square me-2"></i>
                        <span>@yield('title')</span>
                    @else
                        <i class="fa fa-save me-2"></i>
                        <span>@yield('title')</span>
                    @endif
                </div>
            </h2>
        </div>
    
        <div class="card mt-3">
            <div class="card-body">
                <form action="{{ $attestation->exists ? route('scolarite.attestation.update', $attestation) : route('scolarite.attestation.store')}}" method="post" class="vstack gap-2" enctype="multipart/form-data">
                    @method($attestation->id ? "put" : "post")
                    @csrf
                    <div class="col-md-11 d-flex flex-column gap-3 m-auto">
                        <div class="row">
                            <div class="col-md-4 form-floating mt-2">
                                <div class="form-floating">
                                    <input class="form-control border-input @error('reff') is-invalid @enderror" type="text" name="reff" id="reff" placeholder="N° de réfference" value="{{ isset($reff) ? $reff : '' }}" readonly>
                                    <label for="reff" class="label-control label-text">N° de réfference</label>
                                    <div class="invalid-feedback">@error('reff') {{ $message }} @enderror</div>
                                </div>
                            </div>

                            <div class="col-md-8 form-floating mt-2">
                                <div class="form-floating">
                                    <select class="form-select border-input @error('etudiant_id') is-invalid @enderror" name="etudiant_id" id="etudiant_id">
                                        <option value="">Sélectioner L'INE</option>
                                        @foreach($etudiants as $etudiant)
                                            <option @selected(old('etudiant_id', $attestation->etudiant_id == $etudiant->id)) value="{{$etudiant->id}}">{{ $etudiant->ine}} - {{ $etudiant->prenom}} {{ $etudiant->nom}}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingetudiant_id" class="label-control label-text">INE</label>
                                    <div class="invalid-feedback">@error('etudiant_id') {{ $message }} @enderror</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 form-floating mt-2">
                                <div class="form-floating">
                                    <select id="floatingtype" name="attestation_type_id" id="attestation_type_id" class="form-select border-input @error('attestation_type_id') is-invalid @enderror">
                                        <option value="">Sélectionner un type</option>
                                        @foreach($attestation_types as $attestation_type)
                                            <option @selected(old('attestation_type_id', $attestation->attestation_type_id == $attestation_type->id)) value="{{$attestation_type->id}}">{{ ucwords(strtolower($attestation_type->type))}}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingtype" class="label-control label-text">Type d'attestation</label>
                                    <div class="invalid-feedback">@error('attestation_type_id') {{ $message }} @enderror</div>
                                </div>
                            </div>  
                            <div class="col-md-4 form-floating mt-2">
                                <div class="form-floating">
                                    <select class="form-select border-input @error('niveau_id') is-invalid @enderror" name="niveau_id" id="niveau_id">
                                        <option value="">Sélectioner un niveau</option>
                                        @foreach($niveaux as $niveau)
                                            <option @selected(old('niveau_id', $attestation->niveau_id == $niveau->id)) value="{{$niveau->id}}">{{ $niveau->niveau}}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingniveau_id" class="label-control label-text">Niveaux</label>
                                    <div class="invalid-feedback">@error('niveau_id') {{ $message }} @enderror</div>
                                </div>
                            </div>
                            <div class="col-md-4 form-floating mt-2">
                                <div class="form-floating">
                                    <select class="form-select border-input @error('annee_universitaire_id') is-invalid @enderror" name="annee_universitaire_id" id="annee_universitaire_id">
                                        <option value="">Sélectioner une session</option>
                                        @foreach($annee_universitaires as $annee_universitaire)
                                        <option @selected(old('annee_universitaire_id', $attestation->annee_universitaire_id == $annee_universitaire->id)) value="{{$annee_universitaire->id}}">{{ $annee_universitaire->session}}</option>
                                    @endforeach
                                    </select>
                                    <label for="floatingannee_universitaire_id" class="label-control label-text">Année Universitaire</label>
                                    <div class="invalid-feedback">@error('annee_universitaire_id') {{ $message }} @enderror</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7 form-floating mt-2">
                                <div class="form-floating">
                                    <select name="programme_id" id="programme_id" class="form-select border-input @error('programme_id') is-invalid @enderror">
                                        <option value="">Sélectionner un programme</option>
                                        @foreach($programmes as $programme)
                                            <option @selected(old('programme_id', $attestation->programme_id == $programme->id)) value="{{$programme->id}}">{{ $programme->programme}}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingprogramme_id" class="label-control label-text">Programme</label>
                                    <div class="invalid-feedback">@error('programme_id') {{ $message }} @enderror</div>
                                </div>
                            </div>  
                            <div class="col-md-5 col-sm-12 d-flex justify-content-end mt-2">
                                <button type="submit" class="btn-modal px-5">
                                    @if ($attestation->id) 
                                        <i class="fa fa-pencil-square me-1"></i>
                                        Modifier l'attestation
                                    @else 
                                        <i class="fa fa-plus me-1"></i>
                                        Ajouter l'attestation     
                                    @endif
                                </button>
                            </div>
                        </div>
                    </div>   
                </form>
            </div>
        </div>

        @if (!$attestation->id)
        <script>
            // Récupérer le nombre total d'attestations
            var total = {{ $total }};

            // Fonction pour obtenir le numéro de référence formaté
            function obtenirNumeroReference(nombre) {
                var reference = String(nombre);
                while (reference.length < 3) {
                    reference = "0" + reference;
                }
                return reference;
            }

            // Remplir le champ de référence avec le prochain numéro
            document.getElementById("reff").value = obtenirNumeroReference(total + 1);
        </script>
        @endif
    </div>
@endsection
