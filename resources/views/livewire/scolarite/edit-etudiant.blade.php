<div class="card">
    {{-- @if($errors->any())
        <ul>
            @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    @endif --}}
    <div class="card-header card-head">
        <h1 class="bg-card text-center text-white card-head"><i class="fa fa-graduation-cap me-1"></i>Modification de cet enregistrement</h1>
    </div>
    <div class="card-body">
       <form action=""  enctype="multipart/form-data">
            <div class="row mt-3">
                <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-4 form-floating">
                                <div class="form-floating">
                                    <input class="form-control border-input @error('ine') is-invalid @enderror" type="text" wire:model="ine" id="floatingine" placeholder="ine">
                                    <label for="floatingine" class="label-control label-text">INE</label>
                                    <div class="invalid-feedback">@error('ine') {{ $message }} @enderror</div>
                                </div>
                            </div>
                            <div class="col-md-8 form-floating">
                                <div class="form-floating">
                                    <input class="form-control border-input @error('prenom') is-invalid @enderror" type="text" wire:model="prenom" id="floatingprenom" placeholder="Prénom">
                                    <label for="floatingprenom" class="label-control label-text">Prénom</label>
                                    <div class="invalid-feedback">@error('prenom') {{ $message }} @enderror</div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4 form-floating">
                                <div class="form-floating">
                                    <input class="form-control border-input @error('nom') is-invalid @enderror" type="text" wire:model="nom" id="floatingnom" placeholder="Nom">
                                    <label for="floatingnom" class="label-control label-text">Nom</label>
                                    <div class="invalid-feedback">@error('nom') {{ $message }} @enderror</div>
                                </div>
                            </div>
                            <div class="col-md-4 form-floating">
                                <div class="form-floating">
                                    <input class="form-control border-input @error('telephone') is-invalid @enderror" type="tel" wire:model="telephone" id="floatingtelephone" placeholder="Téléphone">
                                    <label for="floatingtelephone" class="label-control label-text">Téléphone</label>
                                    <div class="invalid-feedback">@error('telephone') {{ $message }} @enderror</div>
                                </div>
                            </div>
                            <div class="col-md-4 form-floating">
                                <div class="form-floating">
                                    <input class="form-control border-input @error('email') is-invalid @enderror" type="email" wire:model.defer="email" id="floatingemail" placeholder="Email">
                                    <label for="floatingemail" class="label-control label-text">Email</label>
                                    <div class="invalid-feedback">@error('email') {{ $message }} @enderror</div>

                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4 form-floating">
                                <div class="form-floating">
                                    <input class="form-control border-input @error('session') is-invalid @enderror" type="text" wire:model="session" id="floatingsession" placeholder="session">
                                    <label for="floatingsession">Session</label>
                                    <div class="invalid-feedback">@error('session') {{ $message }} @enderror</div>
                                </div>
                            </div>
                            <div class="col-md-4 form-floating">
                                <div class="form-floating">
                                    <input class="form-control border-input @error('programme') is-invalid @enderror" type="text" wire:model="programme" id="floatingProgramme" placeholder="Nom du programme">
                                    <label for="floatingProgramme">Programme</label>
                                    <div class="invalid-feedback">@error('programme') {{ $message }} @enderror</div>
                                </div>
                            </div>  
                            <div class="col-md-4 form-floating">
                                <div class="form-floating">
                                    <input class="form-control border-input @error('pv') is-invalid @enderror" type="number" wire:model="pv" id="floatingpv" placeholder="pv">
                                    <label for="floatingpv">PV</label>
                                    <div class="invalid-feedback">@error('pv') {{ $message }} @enderror</div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4 form-floating">
                                <div class="form-floating">
                                    <input class="form-control border-input" type="date" wire:model="date_naissance" id="floatingdatenaissance" placeholder="Date Naissance">
                                    <label for="floatingdatenaissance" class="label-control label-text">Date Naissance</label>
                                </div>
                            </div>
                            <div class="col-md-4 form-floating">
                                <div class="form-floating">
                                    <input class="form-control border-input" type="text" wire:model="lieu_naissance" id="floatinglieunaissance" placeholder="Lieu Naissance">
                                    <label for="floatinglieunaissance" class="label-control label-text">Lieu Naissance</label>
                                </div>
                            </div>
                            <div class="col-md-4 form-floating">
                                <div class="form-floating">
                                    <input class="form-control border-input @error('profil') is-invalid @enderror" type="text" wire:model="profil" id="floatingprofil" placeholder="profil">
                                    <label for="floatingprofil">Profil/Option au lycée</label>
                                    <div class="invalid-feedback">@error('profil') {{ $message }} @enderror</div>
                                </div>
                            </div>
                        </div>
                    <div class="row mt-3">
                        <div class="col-md-4 form-floating">
                            <div class="form-floating">
                                <input class="form-control border-input @error('centre') is-invalid @enderror" type="text" wire:model="centre" id="floatingcentre" placeholder="centre">
                                <label for="floatingcentre">Centre</label>
                                <div class="invalid-feedback">@error('centre') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-md-4 form-floating">
                            <div class="form-floating">
                                <input class="form-control border-input @error('ecole_origine') is-invalid @enderror" type="text" wire:model="ecole_origine" id="floatingecole_origine" placeholder="ecole_origine">
                                <label for="floatingecole_origine">Ecole d'origine</label>
                                <div class="invalid-feedback">@error('ecole_origine') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-md-4 form-floating">
                            <div class="form-floating">
                                <input class="form-control border-input @error('pere') is-invalid @enderror" type="text" wire:model="pere" id="floatingpere" placeholder="pere">
                                <label for="floatingpere">Pere</label>
                                <div class="invalid-feedback">@error('pere') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4 form-floating">
                            <div class="form-floating">
                                <input class="form-control border-input @error('mere') is-invalid @enderror" type="text" wire:model="mere" id="floatingmere" placeholder="mere">
                                <label for="floatingmere">Mere</label>
                                <div class="invalid-feedback">@error('mere') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-md-4 form-floating">
                            <div class="form-floating">
                                <input class="form-control border-input @error('nom_tuteur') is-invalid @enderror" type="text" wire:model="nom_tuteur" id="floatingnom_tuteur" placeholder="nom_tuteur">
                                <label for="floatingnom_tuteur">Nom du Tuteur(Optionnel)</label>
                                <div class="invalid-feedback">@error('nom_tuteur') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-md-4 form-floating">
                            <div class="form-floating">
                                <input class="form-control border-input @error('telephone_tuteur') is-invalid @enderror" type="tel" wire:model="telephone_tuteur" id="floatingtelephone_tuteur" placeholder="telephone_tuteur">
                                <label for="floatingtelephone_tuteur">Numero du Tuteur(Optionnel)</label>
                                <div class="invalid-feedback">@error('telephone_tuteur') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4 form-floating">
                            <div class="form-floating">
                                <input class="form-control border-input" type="text" wire:model.defer="adresse" id="floatingadresse" placeholder="Adresse">
                                <label for="floatingadresse" class="label-control label-text">Adresse</label>
                            </div>
                        </div>
                        <div class="col-md-4 form-floating">
                            <div class="form-floating">
                                <input class="form-control border-input @error('diplome') is-invalid @enderror" type="file" wire:model="diplome" id="floatingdiplome" placeholder="diplome">
                                <label for="floatingdiplome">Diplome du BAC</label>
                                <div class="invalid-feedback">@error('diplome') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-md-4 form-floating">
                            <div class="form-floating">
                                <input class="form-control border-input @error('releve_notes') is-invalid @enderror" type="file" wire:model="releve_notes" id="floatingreleve_notes" placeholder="releve_notes">
                                <label for="floatingreleve_notes">Releve de notes BAC</label>
                                <div class="invalid-feedback">@error('releve_notes') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4 form-floating">
                            <div class="form-floating">
                                <input class="form-control border-input @error('extrait_naissance') is-invalid @enderror" type="file" wire:model="extrait_naissance" id="floatingextrait_naissance" placeholder="extrait_naissance">
                                <label for="floatingextrait_naissance">Extrait de Naissance</label>
                                <div class="invalid-feedback">@error('extrait_naissance') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-md-4 form-floating">
                            <div class="form-floating">
                                <input class="form-control border-input @error('certificat_nationalite') is-invalid @enderror" type="file" wire:model="certificat_nationalite" id="floatingcertificat_nationalite" placeholder="certificat_nationalite">
                                <label for="floatingcertificat_nationalite">Certificat de Nationnalite</label>
                                <div class="invalid-feedback">@error('certificat_nationalite') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-md-4 form-floating">
                            <div class="form-floating">
                                <input class="form-control border-input @error('certificat_medical') is-invalid @enderror" type="file" wire:model="certificat_medical" id="floatingcertificat_medical" placeholder="certificat_medical">
                                <label for="floatingcertificat_medical">Certificat Medical</label>
                                <div class="invalid-feedback">@error('certificat_medical') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <h6 class="text-center bg-card text-white p-3 label-text">PHOTO</h6>
                    </div>
                    <div class="row">
                        @if ($etudiant->photo !== null)
                                <center>
                                    <img src="/storage/{{$etudiant->photo }}" class="img-photo card-photo" alt="Photo">
                                </center> 
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
                            <center><button type="submit" wire:click.prevent="update" class="btn-modal"><i class="fa fa-check me-2 mt-2"></i>Terminer la modification</button></center>
                        </div>
                        <div class="row mt-2">
                            <center><button class="btn btn-danger" wire:click='cancel'><i class="fa fa-check me-2 mt-2"></i>
                                Annuler la modification
                            </button></center>
                        </div>
                    </div>
                </div>
            </div>
       </form>
    </div>
</div>

