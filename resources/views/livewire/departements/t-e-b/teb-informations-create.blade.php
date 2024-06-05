<div class="card">
    <div class="card-header card-head">
        <h1 class="bg-card text-center text-white card-head"><i class="fa fa-descri me-1"></i>Formulaire d'enregistrement de la description</h1>
    </div>
    <div class="card-body">
        <form wire:submit.prevent="store" enctype="multipart/form-data">
            <div class="row mt-3">
                <div class="col-md-9 m-auto">
                    <div class="row">
                        <div class="my-2">
                            <div class="form-floating">
                                <input class="form-control border-input @error('departement') is-invalid @enderror" type="text" wire:model="departement" id="floatingdepartement" name="departement" placeholder="Nom du département" value="{{ old('departement', $departement) }}">
                                <div class="invalid-feedback">@error('departement') {{ $message }} @enderror</div>
                                <label for="floatingdepartement" class="label-control label-text">Nom du département<span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="my-2">
                            <div class="form-floating">
                                <input class="form-control border-input @error('code') is-invalid @enderror" type="text" wire:model.defer="code" id="floatingcode" name="code" placeholder="Code" value="{{ old('code', $code) }}">
                                <label for="floatingcode" class="label-control label-text">Code<span class="text-danger">*</span></label>
                                <div class="invalid-feedback">@error('code') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="my-2">
                            <div class="form-floating">
                                <input class="form-control border-input @error('telephone') is-invalid @enderror" type="tel" wire:model.defer="telephone" id="floatingtelephone" name="telephone" placeholder="Téléphone" value="{{ old('telephone', $telephone) }}">
                                <label for="floatingtelephone" class="label-control label-text">Téléphone<span class="text-danger">*</span></label>
                                <div class="invalid-feedback">@error('telephone') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="my-2">
                            <div class="form-floating">
                                <input class="form-control border-input @error('email') is-invalid @enderror" type="email" wire:model.defer="email" id="floatingemail" name="email" placeholder="Adresse email" value="{{ old('email', $email) }}">
                                <label for="floatingemail" class="label-control label-text">Adresse email<span class="text-danger">*</span></label>
                                <div class="invalid-feedback">@error('email') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="my-2">
                            <div class="form-floating">
                                <input class="form-control border-input @error('adresse') is-invalid @enderror" type="text" wire:model.defer="adresse" id="floatingadresse" name="adresse" placeholder="Adresse" value="{{ old('adresse', $adresse) }}">
                                <label for="floatingadresse" class="label-control label-text">Adresse/Quartier<span class="text-danger">*</span></label>
                                <div class="invalid-feedback">@error('adresse') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="my-2">
                            <div class="form-floating">
                                <input class="form-control border-input @error('photo') is-invalid @enderror" type="file" wire:model.defer="photo" id="floatingphoto" name="photo" placeholder="PHOTO">
                                <label for="floatingphoto" class="label-control label-text">PHOTO<span class="text-danger">*</span></label>
                                <div class="invalid-feedback">@error('photo') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="my-2">
                            <div class="form-floating">
                                <textarea name="description" class="form-control border-input @error('description') is-invalid @enderror" wire:model.defer="description" id="description" placeholder="La description" style="height: 150px;">{{ old('description', $description) }}</textarea>
                                <label for="description">La description<span class="text-danger">*</span></label>
                                <div class="invalid-feedback">@error('description') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-center gap-3 my-3">
                        <div>
                            <button type="submit" class="btn-modal py-3"><i class="fa fa-check me-2"></i>Enregistrer la description</button>
                        </div>
                        <div>
                            <button type="button" wire:click='cancel' class="btn btn-danger py-3"><i class="fa fa-times me-2"></i>Annuler la description</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
