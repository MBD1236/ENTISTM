<div class="card">
    
    <div class="card-header card-head">
        <h1 class="bg-card text-center text-white card-head"><i class="fa fa-graduation-cap me-1"></i>Inscription des étudiants</h1>
    </div>
    <div class="card">
        <div class="card-body">
          <!-- Début de notre Switch -->
          <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
            <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="national" aria-selected="true"><span class="switch-text"><i class="fa fa-male"></i>/<i class="fa fa-female me-1"></i>Etudiant.e National.e</span></button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-profile" type="button" role="tab" aria-controls="international" aria-selected="false"><span class="switch-text"><i class="fa fa-male"></i>/<i class="fa fa-female me-1"></i>Etudiant.e international.e</span></button>
            </li>
          </ul>
          <div class="tab-content pt-2" id="borderedTabJustifiedContent">
            <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab">
                <div class="card-body mt-3">
                    <form action="" wire:submit.prevent="init">
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
                   <form action="" wire:submit.prevent="store" enctype="multipart/form-data">
                    {{--  @csrf
                    @method()  --}}
                        <div class="row mt-3">
                            <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-4 form-floating">
                                            <div class="form-floating">
                                                <input class="form-control border-input" type="text" wire:mode.defer="ine" id="floatingine" placeholder="ine" disabled>
                                                <label for="floatingine" class="label-control label-text">INE</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 form-floating">
                                            <div class="form-floating">
                                                <input class="form-control border-input" type="text" wire:model="numrecu" id="floatingrecu" placeholder="N° reçu">
                                                <label for="floatingrecu" class="label-control label-text">N° reçu</label>
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
                                                <input class="form-control border-input" type="date" wire:model.defer="datenaissance" id="floatingdatenaissance" placeholder="Date Naissance" disabled>
                                                <label for="floatingdatenaissance" class="label-control label-text">Date Naissance</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 form-floating">
                                            <div class="form-floating">
                                                <input class="form-control border-input" type="text" wire:model.defer="lieunaissance" id="floatinglieunaissance" placeholder="Lieu Naissance" disabled>
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
                                                <input class="form-control border-input" type="tel" wire:model.defer="nomtuteur" id="floatingnomtuteur" placeholder="Nom du tuteur">
                                                <label for="floatingnomtuteur" class="label-control label-text">Nom du tuteur</label>
                                            </div>
                                        </div>
                                    </div>
                                <div class="row mt-3">
                                    <div class="col-md-4 form-floating">
                                        <div class="form-floating">
                                            <input class="form-control border-input" type="tel" wire:model.defer="telephonetuteur" id="floatingteltuteur" placeholder="Téléphone du tuteur">
                                            <label for="floatingteltuteur" class="label-control label-text">Téléphone du tuteur</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-floating">
                                        <div class="form-floating">
                                            <select class="form-select border-input" wire:model="annee_universitaire_id" id="annee_universitaire_id">
                                                <option value="">Sélectioner une année universitaire</option>
                                                @foreach ($annee_universitaires as $annee_universitaire)
                                                    <option value="{{ $annee_universitaire->id }}" wire:key="{{ $annee_universitaire->id }}">{{ $annee_universitaire->session }}</option>
                                                @endforeach
                                            </select>
                                            <label for="floatinganneeuniv" class="label-control label-text">Année Univerisatire</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-floating">
                                        <div class="form-floating">
                                            <select class="form-select border-input" wire:model="promotion_id" id="promotion_id">
                                                <option value="">Sélectioner une promotion</option>
                                                @foreach ($promotions as $promotion)
                                                    <option value="{{ $promotion->id }}" wire:key="{{ $promotion->id }}">{{ $promotion->promotion }}</option>
                                                @endforeach
                                            </select>
                                            <label for="floatingpromotion" class="label-control label-text">Promotion</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4 form-floating">
                                        <div class="form-floating">
                                            <select class="form-select border-input" wire:model="niveau_id" id="niveau_id">
                                                <option value="0">Sélectioner un niveau</option>
                                                @foreach ($niveaux as $niveau)
                                                    <option value="{{ $niveau->id }}" wire:key="{{ $niveau->id }}">{{ $niveau->niveau }}</option>
                                                @endforeach
                                            </select>
                                            <label for="floatingniveau" class="label-control label-text">Niveau</label>
                                        </div>
                                    </div>
                                    <div class="col-md-8 form-floating">
                                        <div class="form-floating">
                                            <select class="form-select border-input" wire:model="programme_id" id="programme_id">
                                                <option value="0">Sélectioner un programme</option>
                                                @foreach ($programmes as $programme)
                                                    <option value="{{ $programme->id }}" wire:key="{{ $programme->id }}">{{ $programme->programme }}</option>
                                                @endforeach
                                            </select>
                                            <label for="floatingprogramme" class="label-control label-text">Programme</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <h6 class="text-center bg-card text-white p-3 label-text">PHOTO</h6>
                                </div>
                                <div class="row">
                                    @if ($this->inerecherche !== '' && $etudiant) 
                                        @if ($etudiant->photo !== null)
                                            <center>
                                                <img src="/storage/{{$etudiant->photo }}" class="img-fluid" alt="Photo" width="100px" height="100px">
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
                                            <input class="form-control border-input mt-1" type="file" name="" id="">
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
            <div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card-body">
                   <form action="" method="">
                    {{--  @csrf
                    @method()  --}}
                        <div class="row mt-3">
                            <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-4 form-floating">
                                            <div class="form-floating">
                                                <input class="form-control border-input" type="text" name="ine" id="floatingine" placeholder="ine">
                                                <label for="floatingine" class="label-control label-text">INE</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 form-floating">
                                            <div class="form-floating">
                                                <input class="form-control border-input" type="text" name="recu" id="floatingrecu" placeholder="N° reçu">
                                                <label for="floatingrecu" class="label-control label-text">N° reçu</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 form-floating">
                                            <div class="form-floating">
                                                <input class="form-control border-input" type="text" name="nom" id="floatingnom" placeholder="Nom">
                                                <label for="floatingnom" class="label-control label-text">Nom</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4 form-floating">
                                            <div class="form-floating">
                                                <input class="form-control border-input" type="text" name="prenom" id="floatingprenom" placeholder="Prénom">
                                                <label for="floatingprenom" class="label-control label-text">Prénom</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 form-floating">
                                            <div class="form-floating">
                                                <input class="form-control border-input" type="date" name="datenaissance" id="floatingdatenaissance" placeholder="Date Naissance">
                                                <label for="floatingdatenaissance" class="label-control label-text">Date Naissance</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 form-floating">
                                            <div class="form-floating">
                                                <input class="form-control border-input" type="text" name="lieunaissance" id="floatinglieunaissance" placeholder="Lieu Naissance">
                                                <label for="floatinglieunaissance" class="label-control label-text">Lieu Naissance</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-8 form-floating">
                                            <div class="form-floating">
                                                <input class="form-control border-input" type="text" name="filiation" id="floatingfiliation" placeholder="Filiation">
                                                <label for="floatingfiliation" class="label-control label-text">Filiation</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 form-floating">
                                            <div class="form-floating">
                                                <input class="form-control border-input" type="tel" name="telephone" id="floatingtelephone" placeholder="Téléphone">
                                                <label for="floatingtelephone" class="label-control label-text">Téléphone</label>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4 form-floating">
                                            <div class="form-floating">
                                                <input class="form-control border-input" type="email" name="email" id="floatingemail" placeholder="Email">
                                                <label for="floatingemail" class="label-control label-text">Email</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 form-floating">
                                            <div class="form-floating">
                                                <input class="form-control border-input" type="text" name="adresse" id="floatingadresse" placeholder="Adresse">
                                                <label for="floatingadresse" class="label-control label-text">Adresse</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 form-floating">
                                            <div class="form-floating">
                                                <input class="form-control border-input" type="tel" name="nomtuteur" id="floatingnomtuteur" placeholder="Nom du tuteur">
                                                <label for="floatingnomtuteur" class="label-control label-text">Nom du tuteur</label>
                                            </div>
                                        </div>
                                    </div>
                                <div class="row mt-3">
                                    <div class="col-md-4 form-floating">
                                        <div class="form-floating">
                                            <input class="form-control border-input" type="tel" name="teltuteur" id="floatingteltuteur" placeholder="Téléphone du tuteur">
                                            <label for="floatingteltuteur" class="label-control label-text">Téléphone du tuteur</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-floating">
                                        <div class="form-floating">
                                            <select class="form-select border-input" name="anneeuniv" id="anneeuniv">
                                                <option value="">Sélectioner une année universitaire</option>
                                                <option value=""></option>
                                            </select>
                                            <label for="floatinganneeuniv" class="label-control label-text">Année Univerisatire</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-floating">
                                        <div class="form-floating">
                                            <select class="form-select border-input" name="promotion" id="promotion">
                                                <option value="">Sélectioner une promotion</option>
                                                <option value=""></option>
                                            </select>
                                            <label for="floatingpromotion" class="label-control label-text">Promotion</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4 form-floating">
                                        <div class="form-floating">
                                            <select class="form-select border-input" name="niveau" id="niveau">
                                                <option value="">Sélectioner un niveau</option>
                                                <option value=""></option>
                                            </select>
                                            <label for="floatingniveau" class="label-control label-text">Niveau</label>
                                        </div>
                                    </div>
                                    <div class="col-md-8 form-floating">
                                        <div class="form-floating">
                                            <select class="form-select border-input" wire:model="programme_id" id="programme_id">
                                                <option value="0">Sélectioner un programme</option>
                                                @foreach ($programmes as $programme )
                                                    <option value="{{ $programme->id }}" wire:key="{{ $programme->id }}">{{ $programme->programme }}</option>
                                                @endforeach
                                            </select>
                                            <label for="floatingprogramme" class="label-control label-text">Programme</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <h6 class="text-center bg-card text-white p-3 label-text">PHOTO</h6>
                                </div>
                                <div class="row">
                                    <center><img class="img-photo card-photo" src="{{ asset('assets/img/téléchargement.png') }} " alt=""></center>
                                </div>
                                <div class="row mt-2">
                                    <div class="row">
                                        <div class="col">
                                            <center><button type="button" class="btn-modal"><i class="fa fa-camera me-1"></i>Caméra</button></center>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <input class="form-control border-input mt-1" type="file" name="" id="">
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
          </div><!-- Fin de notre Switch -->
        </div>
    </div>
</div>