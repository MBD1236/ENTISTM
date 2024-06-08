@extends('layouts.template-scolarite')

@section('content')

<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-10 bg-card">
            <div class="card">
                <div class="card-header card-head">
                    <h1 class="bg-card text-center text-white card-head"><i class="fa fa-book me-2"></i>Formulaire d'enregistrement des réléves</h1>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ $relevenote->exists ? route('scolarite.releve.update', $relevenote) : route('scolarite.releve.store') }}" enctype="multipart/form-data">
                        @csrf
                        @if ($relevenote->exists)
                            @method('PUT')
                        @endif
                        <div class="row mt-3">
                            <div class="col-md-11 m-auto">
                                <div class="row">
                                    <div class="col-md-6 my-2">
                                        <div class="form-floating">
                                            <input class="form-control border-input @error('reference_id') is-invalid @enderror" type="text" id="reference_id" name="reference_id" placeholder="reference_id" value="{{ old('reference_id', $relevenote->reference_id) }}" readonly>
                                            <div class="invalid-feedback">@error('reference_id') {{ $message }} @enderror</div>
                                            <label for="reference_id" class="label-control label-text">Numéro Reff</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <div class="form-floating">
                                            <input class="form-control border-input @error('ine') is-invalid @enderror" type="text" id="floatingine" name="ine" placeholder="INE" value="{{ old('ine', $relevenote->ine) }}" readonly>
                                            <label for="floatingine" class="label-control label-text">INE</label>
                                            <div class="invalid-feedback">@error('ine') {{ $message }} @enderror</div>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="row">
                                    <div class="col-md-6 my-2">
                                        <div class="form-floating">
                                            <input class="form-control border-input @error('prenom') is-invalid @enderror" type="text" id="floatingprenom" name="prenom" placeholder="Prénom" value="{{ old('prenom', $relevenote->prenom) }}">
                                            <label for="floatingprenom" class="label-control label-text">Prénom</label>
                                            <div class="invalid-feedback">@error('prenom') {{ $message }} @enderror</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <div class="form-floating">
                                            <input class="form-control border-input @error('nom') is-invalid @enderror" type="text" id="floatingnom" name="nom" placeholder="Nom" value="{{ old('nom', $relevenote->nom) }}">
                                            <label for="floatingnom" class="label-control label-text">Nom</label>
                                            <div class="invalid-feedback">@error('nom') {{ $message }} @enderror</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 my-2">
                                        <div class="form-floating">
                                            <input class="form-control border-input @error('telephone') is-invalid @enderror" type="text" id="floatingtelephone" name="telephone" placeholder="Téléphone" value="{{ old('telephone', $relevenote->telephone) }}">
                                            <label for="floatingtelephone" class="label-control label-text">Téléphone</label>
                                            <div class="invalid-feedback">@error('telephone') {{ $message }} @enderror</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <div class="form-floating">
                                            <input class="form-control border-input @error('programme') is-invalid @enderror" type="text" id="floatingprogramme" name="programme" placeholder="Programme" value="{{ old('programme', $relevenote->programme) }}">
                                            <label for="floatingprogramme" class="label-control label-text">Programme</label>
                                            <div class="invalid-feedback">@error('programme') {{ $message }} @enderror</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 py-2">
                                        <div class="d-flex flex-row justify-content-center gap-3">
                                            <div>
                                                <button type="submit" class="btn-modal py-3 px-5">
                                                    @if ($relevenote->exists)
                                                        <i class="fa fa-pencil-square me-2"></i>Mettre à jour le relevé de note
                                                    @else
                                                        <i class="fa fa-check me-2"></i>Enregistrer le relevé de note
                                                    @endif
                                                </button>
                                            </div>
                                            <div>
                                                <button type="button" onclick="window.history.back()" class="btn btn-danger py-3 px-5"><i class="fa fa-times me-2"></i>Annuler</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>            
        </div>
    </div>
</div>

@endsection
