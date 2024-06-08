<div class="card">
    <div class="card-header card-head">
        <h1 class="bg-card text-center text-white card-head">
            <i class="fa fa-book me-2"></i>Formulaire de modification des réçus
        </h1>
    </div>
    <div class="card-body">
        <form wire:submit.prevent="update" enctype="multipart/form-data">
            <div class="row mt-3">
                <div class="col-md-11 m-auto">
                    <div class="row">
                        <div class="col-md-3 my-2">
                            <div class="form-floating">
                                <input class="form-control border-input @error('numerorecu') is-invalid @enderror" type="text" wire:model="numerorecu" id="numerorecu" name="numerorecu" placeholder="numerorecu" readonly>
                                <div class="invalid-feedback">@error('numerorecu') {{ $message }} @enderror</div>
                                <label for="numerorecu" class="label-control label-text">Numéro Réçu</label>
                            </div>
                        </div>
                        <div class="col-md-3 my-2">
                            <div class="form-floating">
                                <input class="form-control border-input @error('serie') is-invalid @enderror" type="text" wire:model.defer="serie" id="floatingserie" name="serie" placeholder="serie" value="{{ old('serie', $serie) }}" wire:click='clearStatus'>
                                <label for="floatingserie" class="label-control label-text">Série</label>
                                <div class="invalid-feedback">@error('serie') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-floating">
                                <input class="form-control border-input @error('somme') is-invalid @enderror" type="text" wire:model.defer="somme" id="floatingsomme" name="somme" placeholder="La somme de : (en toute lettres)" value="{{ old('somme', $somme) }}" wire:click='clearStatus'>
                                <label for="floatingsomme" class="label-control label-text">La somme de : (en toute lettres)</label>
                                <div class="invalid-feedback">@error('somme') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 my-2">
                            <div class="form-floating">
                                <select class="form-select border-input @error('etudiant_id') is-invalid @enderror"
                                    wire:model="etudiant_id" id="etudiant_id" wire:click='clearStatus'>
                                    <option value="">Sélectionner un étudiant</option>
                                    @foreach ($etudiants as $etudiant)
                                    <option value="{{ $etudiant->id }}"
                                        wire:key="{{ $etudiant->id }}">{{ $etudiant->ine }} - {{ $etudiant->prenom }}
                                        {{ $etudiant->nom }}</option>
                                    @endforeach
                                </select>
                                <label for="floating" class="label-control label-text">Étudiants</label>
                                <div class="invalid-feedback">@error('etudiant_id') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-floating">
                                <select class="form-select border-input @error('departement_id') is-invalid @enderror"
                                    wire:model="departement_id" id="departement_id" wire:click='clearStatus'>
                                    <option value="">Sélectionner un département</option>
                                    @foreach ($departements as $departement)
                                    <option value="{{ $departement->id }}"
                                        wire:key="{{ $departement->id }}">{{ $departement->departement }}</option>
                                    @endforeach
                                </select>
                                <label for="floating" class="label-control label-text">Départements</label>
                                <div class="invalid-feedback">@error('departement_id') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 my-2">
                            <div class="form-floating">
                                <select class="form-select border-input @error('promotion_id') is-invalid @enderror"
                                    wire:model="promotion_id" id="promotion_id" wire:click='clearStatus'>
                                    <option value="">Sélectionner une promotion</option>
                                    @foreach ($promotions as $promotion)
                                    <option value="{{ $promotion->id }}"
                                        wire:key="{{ $promotion->id }}">{{ $promotion->promotion }}</option>
                                    @endforeach
                                </select>
                                <label for="floating" class="label-control label-text">Promotions</label>
                                <div class="invalid-feedback">@error('promotion_id') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-floating">
                                <select class="form-select border-input @error('nature_recu_id') is-invalid @enderror"
                                    wire:model="nature_recu_id" id="nature_recu_id" wire:click='clearStatus'>
                                    <option value="">Sélectionner un type de réçu</option>
                                    @foreach ($naturerecus as $naturerecu)
                                    <option value="{{ $naturerecu->id }}"
                                        wire:key="{{ $naturerecu->id }}">{{ $naturerecu->nature }}</option>
                                    @endforeach
                                </select>
                                <label for="floating" class="label-control label-text">Type de réçu</label>
                                <div class="invalid-feedback">@error('nature_recu_id') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 my-2">
                            <div class="form-floating">
                                <select class="form-select border-input @error('modereglement') is-invalid @enderror"
                                    wire:model="modereglement" id="modereglement" wire:click='clearStatus'>
                                    <option value="">Sélectionner un mode de règlement</option>
                                    <option value="Espece">Espèce</option>
                                    <option value="Electronique">Électronique</option>
                                </select>
                                <label for="floating" class="label-control label-text">Mode de règlement</label>
                                <div class="invalid-feedback">@error('modereglement') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-md-6 py-2">
                            <div class="d-flex flex-row justify-content-center gap-3">
                                <div>
                                    <button type="submit" class="btn-modal py-3">
                                        <i class="fa fa-check me-2"></i>Modifier un récu
                                    </button>
                                </div>
                                <div>
                                    <button type="button" wire:click='cancel' class="btn btn-danger py-3">
                                        <i class="fa fa-times me-2"></i>Annuler la modification
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
