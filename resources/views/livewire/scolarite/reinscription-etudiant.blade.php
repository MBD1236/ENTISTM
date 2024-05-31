<div class="card">
    <div class="card-header card-head">
        <h1 class="bg-card text-center text-white card-head"><i class="fa fa-graduation-cap me-1"></i>Réinscription des étudiants</h1>
    </div>
    <div class="card-body">
        <form action="" wire:submit.prevent="init">
        @csrf
            <div class="row">
                <div class="col-md-4 mt-1">
                    <input class="form-control border-input" type="search" wire:model="inerecherche" id="floatinginerecherche" placeholder="Entrez l'INE de l'étudiant">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn-modal"><i class="fa fa-search"></i>Rechercher</button>
                </div>
                <div class="col-md-4"></div>
            </div>
        </form>
       <form action="" wire:submit="store" enctype="multipart/form-data">
        @csrf
            <div class="row mt-3">
                <div class="form-floating">
                    <input class="form-control border-input @error('etudiant_id') is-invalid @enderror" type="hidden" wire:model.defer="etudiant_id" id="floatingetudiant_id" placeholder="etudiant_id">
                    <div class="invalid-feedback">@error('etudiant_id') {{ $message }} @enderror</div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-4 form-floating">
                                <div class="form-floating">
                                    <input class="form-control border-input" type="text" wire:model.defer="ine" id="floatingine" placeholder="ine" disabled>
                                    <label for="floatingine" class="label-control label-text">INE</label>
                                </div>
                            </div>
                            <div class="col-md-4 form-floating">
                                <div class="form-floating">
                                    <input class="form-control border-input @error('recu_id') is-invalid @enderror" type="text" wire:model="recu_id" wire:click='clearStatus' id="floatingrecu" placeholder="N° reçu">
                                    <label for="floatingrecu" class="label-control label-text">N° reçu<span class="text-danger">*</span></label>
                                    <div class="invalid-feedback">@error('recu_id') {{ $message }} @enderror</div>
                                </div>
                            </div>
                            <div class="col-md-4 form-floating">
                                <div class="form-floating">
                                    <input class="form-control border-input" type="text" wire:model.defer="nom" id="floatingnom" placeholder="Nom" disabled>
                                    <label for="floatingnom" class="label-control label-text">Nom</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4 form-floating">
                                <div class="form-floating">
                                    <input class="form-control border-input" type="text" wire:model.defer="prenom" id="floatingprenom" placeholder="Prénom" disabled>
                                    <label for="floatingprenom" class="label-control label-text">Prénom</label>
                                </div>
                            </div>
                            <div class="col-md-4 form-floating">
                                <div class="form-floating">
                                    <input class="form-control border-input" type="date" wire:model.defer="date_naissance" id="floatingdatenaissance" placeholder="Date Naissance" disabled>
                                    <label for="floatingdatenaissance" class="label-control label-text">Date Naissance</label>
                                </div>
                            </div>
                            <div class="col-md-4 form-floating">
                                <div class="form-floating">
                                    <input class="form-control border-input" type="text" wire:model.defer="lieu_naissance" id="floatinglieunaissance" placeholder="Lieu Naissance" disabled>
                                    <label for="floatinglieunaissance" class="label-control label-text">Lieu Naissance</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-8 form-floating">
                                <div class="form-floating">
                                    <input class="form-control border-input" type="text" value="{{ $this->pere }} Et de {{ $this->mere }}" id="floatingfiliation" placeholder="Filiation" disabled>
                                    <label for="floatingfiliation" class="label-control label-text">Filiation</label>
                                </div>
                            </div>
                            <div class="col-md-4 form-floating">
                                <div class="form-floating">
                                    <input class="form-control border-input" type="tel" wire:model.defer="telephone" id="floatingtelephone" placeholder="Téléphone">
                                    <label for="floatingtelephone" class="label-control label-text">Téléphone</label>
                                </div>
                            </div>  
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4 form-floating">
                                <div class="form-floating">
                                    <input class="form-control border-input" type="email" wire:model.defer="email" id="floatingemail" placeholder="Email">
                                    <label for="floatingemail" class="label-control label-text">Email</label>
                                </div>
                            </div>
                            <div class="col-md-4 form-floating">
                                <div class="form-floating">
                                    <input class="form-control border-input" type="text" wire:model.defer="adresse" id="floatingadresse" placeholder="Adresse">
                                    <label for="floatingadresse" class="label-control label-text">Adresse</label>
                                </div>
                            </div>
                            <div class="col-md-4 form-floating">
                                <div class="form-floating">
                                    <input class="form-control border-input" type="tel" wire:model.defer="nom_tuteur" id="floatingnomtuteur" placeholder="Nom du tuteur">
                                    <label for="floatingnomtuteur" class="label-control label-text">Nom du tuteur</label>
                                </div>
                            </div>
                        </div>
                    <div class="row mt-3">
                        <div class="col-md-4 form-floating">
                            <div class="form-floating">
                                <input class="form-control border-input" type="tel" wire:model.defer="telephone_tuteur" id="floatingteltuteur" placeholder="Téléphone du tuteur">
                                <label for="floatingteltuteur" class="label-control label-text">Téléphone du tuteur</label>
                            </div>
                        </div>
                        <div class="col-md-4 form-floating">
                            <div class="form-floating">
                                <select class="form-select border-input @error('annee_universitaire_id') is-invalid @enderror" wire:model="annee_universitaire_id" id="annee_universitaire_id" wire:click='clearStatus'>
                                    <option value="">Sélectioner une année universitaire</option>
                                    @foreach ($annee_universitaires as $annee_universitaire)
                                        <option value="{{ $annee_universitaire->id }}" wire:key="{{ $annee_universitaire->id }}">{{ $annee_universitaire->session }}</option>
                                    @endforeach
                                </select>
                                <label for="floatinganneeuniv" class="label-control label-text">Année Univerisataire<span class="text-danger">*</span></label>
                                <div class="invalid-feedback">@error('annee_univ_id') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-md-4 form-floating">
                            <div class="form-floating">
                                <select class="form-select border-input @error('promotion_id') is-invalid @enderror" wire:model="promotion_id" id="promotion_id" wire:click='clearStatus' disabled>
                                    <option value="">Sélectioner une promotion</option>
                                    @foreach ($promotions as $promotion)
                                    
                                        @if($this->inerecherche !== '' && $etudiant && $infoEtudiantIns !== null)
                                            <option @selected($infoEtudiantIns->promotion_id == $promotion->id) value="{{ $promotion->id }}" wire:key="{{ $promotion->id }}">{{ $promotion->promotion }}</option>
                                        @else
                                            <option value="{{ $promotion->id }}" wire:key="{{ $promotion->id }}">{{ $promotion->promotion }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <label for="floatingpromotion" class="label-control label-text">Promotion<span class="text-danger">*</span></label>
                                <div class="invalid-feedback">@error('promotion_id') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4 form-floating">
                            <div class="form-floating">
                                <select class="form-select border-input @error('niveau_id') is-invalid @enderror" wire:model="niveau_id" wire:click='clearStatus' id="niveau_id">
                                    <option value="0">Sélectioner un niveau</option>
                                    @foreach ($niveaux as $niveau)
                                        <option value="{{ $niveau->id }}" wire:key="{{ $niveau->id }}">{{ $niveau->niveau }}</option>
                                    @endforeach
                                </select>
                                <label for="floatingniveau" class="label-control label-text">Niveau<span class="text-danger">*</span>   </label>
                                <div class="invalid-feedback">@error('niveau_id') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-md-8 form-floating">
                            <div class="form-floating">
                                <select class="form-select border-input @error('programme_id') is-invalid @enderror" wire:model="programme_id" id="programme_id" wire:click='clearStatus' disabled>
                                    <option value="0">Sélectioner un programme</option>
                                    @foreach ($programmes as $programme)
                                        @if ($this->inerecherche !== '' && $etudiant && $infoEtudiantIns !== null)
                                            <option @selected($infoEtudiantIns->programme_id == $programme->id) value="{{ $infoEtudiantIns->programme_id }}" wire:key="{{ $infoEtudiantIns->programme_id }}">{{ $infoEtudiantIns->programme->programme }}</option>
                                        @else
                                            <option value="{{ $programme->id }}" wire:key="{{ $programme->id }}">{{ $programme->programme }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <label for="floatingprogramme" class="label-control label-text">Programme<span class="text-danger">*</span></label>
                                <div class="invalid-feedback">@error('programme_id') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <h6 class="text-center bg-card text-white p-3 label-text">PHOTO</h6>
                    </div>
                    <div class="row">
                        @if ($this->inerecherche !== '' && $etudiant && $infoEtudiantIns !== null) 
                            @if ($etudiant->photo !== null)
                                <center>
                                    <img src="/storage/{{$etudiant->photo }}" class="img-photo card-photo" alt="Photo">
                                </center> 
                            @else
                                <center><img class="img-photo card-photo" src="{{ asset('assets/img/téléchargement.png') }} " alt=""></center>
                            @endif
                        @else
                            <center><img class="img-photo card-photo" src="{{ asset('assets/img/téléchargement.png') }} " alt=""></center>
                        @endif
                   
                    </div>
                    <div class="row mt-2">
                        <div class="row">
                            <div class="col">
                                <center><button type="button" class="btn-modal"><i class="fa fa-camera me-1"></i>Caméra</button></center>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <input class="form-control border-input mt-1 @error('photo') is-invalid @enderror" type="file" wire:model="photo" id="photo">
                                <div class="invalid-feedback">@error('photo') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <center><button type="submit" class="btn-modal"><i class="fa fa-check me-2 mt-2"></i>Terminer l'inscription</button></center>
                        </div>
                    </div>
                </div>
            </div>
       </form>
    </div>
</div>
