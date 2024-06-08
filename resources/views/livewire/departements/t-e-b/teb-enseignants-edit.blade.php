<div class="card">
    <div class="card-header card-head">
        <h1 class="bg-card text-center text-white card-head"><i class="fa fa-descri me-1"></i>Formulaire de modification des enseignants</h1>
    </div>
    <div class="card-body">
        <form wire:submit.prevent="update" enctype="multipart/form-data">
            <div class="row mt-3">
                <div class="col-md-9 m-auto">
                    <div class="row">
                        <div class="col-md-6 my-2">
                            <div class="form-floating">
                                <input class="form-control border-input @error('matricule') is-invalid @enderror" type="text" wire:model="matricule" id="floatingmatricule" name="matricule" placeholder="Matricule" value="{{ old('matricule', $matricule) }}" wire:click='clearStatus'>
                                <div class="invalid-feedback">@error('matricule') {{ $message }} @enderror</div>
                                <label for="floatingmatricule" class="label-control label-text">Matricule</label>
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-floating">
                                <input class="form-control border-input @error('prenom') is-invalid @enderror" type="text" wire:model.defer="prenom" id="floatingprenom" name="prenom" placeholder="prenom" value="{{ old('prenom', $prenom) }}" wire:click='clearStatus'>
                                <label for="floatingprenom" class="label-control label-text">Prénom</label>
                                <div class="invalid-feedback">@error('prenom') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-floating">
                                <input class="form-control border-input @error('nom') is-invalid @enderror" type="text" wire:model.defer="nom" id="floatingnom" name="nom" placeholder="nom" value="{{ old('nom', $nom) }}" wire:click='clearStatus'>
                                <label for="floatingnom" class="label-control label-text">Nom</label>
                                <div class="invalid-feedback">@error('nom') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-floating">
                                <input class="form-control border-input @error('telephone') is-invalid @enderror" type="tel" wire:model.defer="telephone" id="floatingtelephone" name="telephone" placeholder="Téléphone" value="{{ old('telephone', $telephone) }}" wire:click='clearStatus'>
                                <label for="floatingtelephone" class="label-control label-text">Téléphone</label>
                                <div class="invalid-feedback">@error('telephone') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-floating">
                                <input class="form-control border-input @error('email') is-invalid @enderror" type="email" wire:model.defer="email" id="floatingemail" name="email" placeholder="Adresse email" value="{{ old('email', $email) }}" wire:click='clearStatus'>
                                <label for="floatingemail" class="label-control label-text">Adresse email</label>
                                <div class="invalid-feedback">@error('email') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-floating">
                                <input class="form-control border-input @error('adresse') is-invalid @enderror" type="text" wire:model.defer="adresse" id="floatingadresse" name="adresse" placeholder="Adresse" value="{{ old('adresse', $adresse) }}" wire:click='clearStatus'>
                                <label for="floatingadresse" class="label-control label-text">Adresse/Quartier</label>
                                <div class="invalid-feedback">@error('adresse') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-floating">
                                <input class="form-control border-input @error('photo') is-invalid @enderror" type="file" wire:model.defer="photo" id="floatingphoto" name="photo" placeholder="PHOTO" wire:click='clearStatus'>
                                <label for="floatingphoto" class="label-control label-text">PHOTO</label>
                                <div class="invalid-feedback">@error('photo') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-floating">
                                <select class="form-select border-input @error('departement_id') is-invalid @enderror" wire:model="departement_id" id="departement_id" wire:click='clearStatus'>
                                    <option value="">Séléctionner un département</option>
                                    @foreach ($departements as $departement)
                                        <option value="{{ $departement->id }}" wire:key="{{ $departement->id }}">{{ $departement->departement }}</option>
                                    @endforeach
                                </select>
                                <label for="floating" class="label-control label-text">Départements</label>
                                <div class="invalid-feedback">@error('departement_id') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-center gap-3 my-3">
                        <div>
                            <button type="submit" class="btn-modal py-3"><i class="fa fa-check me-2"></i>Modification d'un enseignant</button>
                        </div>
                        <div>
                            <button type="button" wire:click='cancel' class="btn btn-danger py-3"><i class="fa fa-times me-2"></i>Annuler la modification</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
