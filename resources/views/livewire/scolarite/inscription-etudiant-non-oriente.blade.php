<div class="card">
   
    <div class="card-header card-head">
        <h1 class="bg-card text-center text-white card-head"><i class="fa fa-graduation-cap me-1"></i>Inscription des étudiants non orientés</h1>
    </div>
    <div class="card">
        <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                        <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100 active" id="profil-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-profil" type="button" role="tab" aria-controls="national" aria-selected="true"><span class="switch-text"><i class="fa fa-male"></i>/<i class="fa fa-female me-1"></i>Etudiant.e non orienté.e</span></button>
                        </li>
                    </ul>
                    <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                    <div class="tab-pane fade show active" id="bordered-justified-profil" role="tabpanel" aria-labelledby="profil-tab">
                    <form action="" wire:submit.prevent="save" enctype="multipart/form-data">
                        <!-- Information personnelle -->
                
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row mt-3">
                                    <div class="col-md-4 form-floating">
                                        <div class="form-floating">
                                            <input class="form-control border-input @error('nom') is-invalid @enderror" type="text" wire:model.defer="nom" id="floatingnom" placeholder="Nom" wire:click='clearStatus'>
                                            <label for="floatingnom" class="label-control label-text">Nom<span class="text-danger">*</span></label>
                                            <div class="invalid-feedback">@error('nom') {{ $message }} @enderror</div>

                                        </div>
                                    </div>
                                    <div class="col-md-4 form-floating">
                                        <div class="form-floating">
                                            <input class="form-control border-input @error('prenom') is-invalid @enderror" type="text" wire:model.defer="prenom" id="floatingprenom" placeholder="Prénom">
                                            <label for="floatingprenom" class="label-control label-text">Prénom<span class="text-danger">*</span></label>
                                            <div class="invalid-feedback">@error('prenom') {{ $message }} @enderror</div>

                                        </div>
                                    </div>
                                    <div class="col-md-4 form-floating">
                                        <div class="form-floating">
                                            <input class="form-control border-input @error('telephone') is-invalid @enderror" type="tel" wire:model.defer="telephone" id="floatingtelephone" placeholder="Téléphone">
                                            <label for="floatingtelephone" class="label-control label-text">Téléphone<span class="text-danger">*</span></label>
                                            <div class="invalid-feedback">@error('telephone') {{ $message }} @enderror</div>

                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mt-3">
                                    <div class="col-md-4 form-floating">
                                        <div class="form-floating">
                                            <input class="form-control border-input @error('email') is-invalid @enderror" type="email" wire:model.defer="email" id="floatingemail" placeholder="Email">
                                            <label for="floatingemail" class="label-control label-text">Email<span class="text-danger">*</span></label>
                                            <div class="invalid-feedback">@error('email') {{ $message }} @enderror</div>

                                        </div>
                                    </div>
                                    <div class="col-md-4 form-floating">
                                        <div class="form-floating">
                                            <input class="form-control border-input @error('pv') is-invalid @enderror" type="text" wire:model.defer="pv" id="floatingpv" placeholder="PV">
                                            <label for="floatingpv" class="label-control label-text">PV<span class="text-danger">*</span></label>
                                            <div class="invalid-feedback">@error('pv') {{ $message }} @enderror</div>

                                        </div>
                                    </div>
                                    <div class="col-md-4 form-floating">
                                        <div class="form-floating">
                                            <input class="form-control border-input @error('ine') is-invalid @enderror" type="text" wire:model.defer="ine" id="floatingine" placeholder="INE">
                                            <label for="floatingine" class="label-control label-text">INE<span class="text-danger">*</span></label>
                                            <div class="invalid-feedback">@error('ine') {{ $message }} @enderror</div>

                                        </div>
                                    </div>
                                </div>
                            
                                <div class="row mt-3">
                                    <div class="col-md-4 form-floating">
                                        <div class="form-floating">
                                            <input class="form-control border-input @error('session') is-invalid @enderror" type="text" wire:model.defer="session" id="floatingsession" placeholder="Session">
                                            <label for="floatingsession" class="label-control label-text">Session<span class="text-danger">*</span></label>
                                            <div class="invalid-feedback">@error('session') {{ $message }} @enderror</div>

                                        </div>
                                    </div>
                                    <div class="col-md-4 form-floating">
                                        <div class="form-floating">
                                            <input class="form-control border-input @error('profil') is-invalid @enderror" type="text" wire:model.defer="profil" id="floatingprofil" placeholder="Profil">
                                            <label for="floatingprofil" class="label-control label-text">Profil<span class="text-danger">*</span></label>
                                            <div class="invalid-feedback">@error('profil') {{ $message }} @enderror</div>

                                        </div>
                                    </div>
                                    <div class="col-md-4 form-floating">
                                        <div class="form-floating">
                                            <input class="form-control border-input @error('centre') is-invalid @enderror" type="text" wire:model.defer="centre" id="floatingcentre" placeholder="Centre">
                                            <label for="floatingcentre" class="label-control label-text">Centre<span class="text-danger">*</span></label>
                                            <div class="invalid-feedback">@error('centre') {{ $message }} @enderror</div>

                                        </div>
                                    </div>
                                </div>
                            
                                <div class="row mt-3">
                                    <div class="col-md-4 form-floating">
                                        <div class="form-floating">
                                            <input class="form-control border-input @error('ecole_origine') is-invalid @enderror" type="text" wire:model.defer="ecole_origine" id="floatingecole_origine" placeholder="École d'origine">
                                            <label for="floatingecole_origine" class="label-control label-text">École d'origine<span class="text-danger">*</span></label>
                                            <div class="invalid-feedback">@error('ecole_origine') {{ $message }} @enderror</div>

                                        </div>
                                    </div>
                                    <div class="col-md-4 form-floating">
                                       <div class="form-floating">
                                            <input class="form-control border-input @error('date_naissance') is-invalid @enderror" type="date" wire:model.defer="date_naissance" id="floatingdate_naissance" placeholder="Date de Naissance">
                                            <label for="floatingdate_naissance" class="label-control label-text">Date de Naissance<span class="text-danger">*</span></label>
                                            <div class="invalid-feedback">@error('date_naissance') {{ $message }} @enderror</div>

                                       </div>
                                    </div>
                                    <div class="col-md-4 form-floating">
                                        <div class="form-floating">
                                            <input class="form-control border-input @error('lieu_naissance') is-invalid @enderror" type="text" wire:model.defer="lieu_naissance" id="floatinglieu_naissance" placeholder="Lieu de Naissance">
                                            <label for="floatinglieu_naissance" class="label-control label-text">Lieu de Naissance<span class="text-danger">*</span></label>
                                            <div class="invalid-feedback">@error('lieu_naissance') {{ $message }} @enderror</div>

                                        </div>
                                    </div>
                                </div>
                            
                                <div class="row mt-3">
                                    <div class="col-md-4 form-floating">
                                        <div class="form-floating">
                                            <input class="form-control border-input @error('pere') is-invalid @enderror" type="text" wire:model.defer="pere" id="floatingpere" placeholder="Père">
                                            <label for="floatingpere" class="label-control label-text">Père<span class="text-danger">*</span></label>
                                            <div class="invalid-feedback">@error('pere') {{ $message }} @enderror</div>

                                        </div>
                                    </div>
                                    <div class="col-md-4 form-floating">
                                        <div class="form-floating">
                                            <input class="form-control border-input @error('mere') is-invalid @enderror" type="text" wire:model.defer="mere" id="floatingmere" placeholder="Mère">
                                            <label for="floatingmere" class="label-control label-text">Mère<span class="text-danger">*</span></label>
                                            <div class="invalid-feedback">@error('mere') {{ $message }} @enderror</div>

                                        </div>
                                    </div>
                                    <div class="col-md-4 form-floating">
                                        <div class="form-floating">
                                            <input class="form-control border-input @error('programme') is-invalid @enderror" type="text" wire:model.defer="programme" id="floatingprogramme" placeholder="Programme">
                                            <label for="floatingprogramme" class="label-control label-text">Programme<span class="text-danger">*</span></label>
                                            <div class="invalid-feedback">@error('programme') {{ $message }} @enderror</div>
                                        </div>
                                    </div>
                                </div>
                            
                                <!-- Programme et tutorat -->
                                <div class="row mt-3">
                                   
                                    <div class="col-md-4 form-floating">
                                        <div class="form-floating">
                                            <input class="form-control border-input @error('nom_tuteur') is-invalid @enderror" type="text" wire:model.defer="nom_tuteur" id="floatingnom_tuteur" placeholder="Nom du tuteur">
                                            <label for="floatingnom_tuteur" class="label-control label-text">Nom du tuteur<span class="text-danger">*</span></label>
                                            <div class="invalid-feedback">@error('nom_tuteur') {{ $message }} @enderror</div>

                                        </div>
                                    </div>
                                    <div class="col-md-4 form-floating">
                                        <div class="form-floating">
                                            <input class="form-control border-input @error('telephone_tuteur') is-invalid @enderror" type="tel" wire:model.defer="telephone_tuteur" id="floatingtelephone_tuteur" placeholder="Téléphone du tuteur">
                                            <label for="floatingtelephone_tuteur" class="label-control label-text">Téléphone du tuteur<span class="text-danger">*</span></label>
                                            <div class="invalid-feedback">@error('telephone_tuteur') {{ $message }} @enderror</div>

                                        </div>
                                    </div>
                                    <div class="col-md-4 form-floating">
                                        <div class="form-floating">
                                            <input class="form-control border-input @error('adresse') is-invalid @enderror" type="text" wire:model.defer="adresse" id="floatingadresse" placeholder="Adresse">
                                            <label for="floatingadresse" class="label-control label-text">Adresse<span class="text-danger">*</span></label>
                                            <div class="invalid-feedback">@error('adresse') {{ $message }} @enderror</div>

                                        </div>
                                    </div>
                                </div>
                            
                                <!-- Documents -->
                                <div class="row mt-3">
                                    <div class="col-md-4 form-floating">
                                        <div class="form-floating">
                                            <input class="form-control border-input @error('diplome') is-invalid @enderror" type="file" wire:model="diplome" id="floatingdiplome" placeholder="Diplôme">
                                            <label for="floatingdiplome" class="label-control label-text">Diplôme<span class="text-danger">*</span></label>
                                            <div class="invalid-feedback">@error('diplome') {{ $message }} @enderror</div>
                                            <div class="invalid-feedback">@error('diplome') {{ $message }} @enderror</div>

                                        </div>
                                    </div>
                                    <div class="col-md-4 form-floating">
                                        <div class="form-floating">
                                            <input class="form-control border-input @error('releve_notes') is-invalid @enderror" type="file" wire:model="releve_notes" id="floatingreleve_notes" placeholder="Relevé de Notes">
                                            <label for="floatingreleve_notes" class="label-control label-text">Relevé de Notes<span class="text-danger">*</span></label>
                                            <div class="invalid-feedback">@error('releve_notes') {{ $message }} @enderror</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-floating">
                                        <div class="form-floating">
                                            <input class="form-control border-input @error('extrait_naissance') is-invalid @enderror" type="file" wire:model="extrait_naissance" id="floatingextrait_naissance" placeholder="Extrait de Naissance">
                                            <label for="floatingextrait_naissance" class="label-control label-text">Extrait de Naissance<span class="text-danger">*</span></label>
                                            <div class="invalid-feedback">@error('extrait_naissance') {{ $message }} @enderror</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4 form-floating">
                                        <div class="form-floating">
                                            <input class="form-control border-input @error('certificat_nationalite') is-invalid @enderror" type="file" wire:model="certificat_nationalite" id="floatingcertificat_nationalite" placeholder="Certificat de Nationalité">
                                            <label for="floatingcertificat_nationalite" class="label-control label-text">Certificat de Nationalité<span class="text-danger">*</span></label>
                                            <div class="invalid-feedback">@error('certificat_nationalite') {{ $message }} @enderror</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-floating">
                                        <div class="form-floating">
                                            <input class="form-control border-input @error('certificat_medical') is-invalid @enderror" type="file" wire:model="certificat_medical" id="floatingcertificat_medical" placeholder="Certificat de Medical">
                                            <label for="floatingcertificat_medical" class="label-control label-text">Certificat de Medical<span class="text-danger">*</span></label>
                                            <div class="invalid-feedback">@error('certificat_medical') {{ $message }} @enderror</div>
                                        
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-floating">
                                        <div class="form-floating">
                                            <input class="form-control border-input @error('recu_id') is-invalid @enderror" type="text" wire:model="recu_id" wire:click='clearStatus' id="floatingrecu" placeholder="N° reçu">
                                            <label for="floatingrecu" class="label-control label-text">N° reçu<span class="text-danger">*</span></label>
                                            <div class="invalid-feedback">@error('recu_id') {{ $message }} @enderror</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-3 form-floating">
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
                                    <div class="col-md-3 form-floating">
                                        <div class="form-floating">
                                            <select class="form-select border-input @error('promotion_id') is-invalid @enderror" wire:model="promotion_id" id="promotion_id" wire:click='clearStatus'>
                                                <option value="">Sélectioner une promotion</option>
                                                @foreach ($promotions as $promotion)
                                                    <option value="{{ $promotion->id }}" wire:key="{{ $promotion->id }}">{{ $promotion->promotion }}</option>
                                                @endforeach
                                            </select>
                                            <label for="floatingpromotion" class="label-control label-text">Promotion<span class="text-danger">*</span></label>
                                            <div class="invalid-feedback">@error('promotion_id') {{ $message }} @enderror</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 form-floating">
                                        <div class="form-floating">
                                            <select class="form-select border-input @error('niveau_id') is-invalid @enderror" wire:model="niveau_id" wire:click='clearStatus' id="niveau_id">
                                                <option value="0">Sélectioner un niveau</option>
                                                @foreach ($niveaux as $niveau)
                                                    <option value="{{ $niveau->id }}" wire:key="{{ $niveau->id }}">{{ $niveau->niveau }}</option>
                                                @endforeach
                                            </select>
                                            <label for="floatingniveau" class="label-control label-text">Niveau<span class="text-danger">*</span></label>
                                            <div class="invalid-feedback">@error('niveau_id') {{ $message }} @enderror</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 form-floating">
                                        <div class="form-floating">
                                            <select class="form-select border-input @error('programme_id') is-invalid @enderror" wire:model="programme_id" id="programme_id" wire:click='clearStatus'>
                                                <option value="0">Sélectioner un programme</option>
                                                @foreach ($programmes as $programme)
                                                    <option value="{{ $programme->id }}" wire:key="{{ $programme->id }}">{{ $programme->programme }}</option>
                                                @endforeach
                                            </select>
                                            <label for="floatingprogramme" class="label-control label-text">Programme<span class="text-danger">*</span></label>
                                            <div class="invalid-feedback">@error('programme_id') {{ $message }} @enderror</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mt-3">
                                <div class="row">
                                    <h6 class="text-center bg-card text-white p-3 label-text">PHOTO</h6>
                                </div>
                                <div class="row">
                                    @if ($this->inerecherche !== '' && $etudiant) 
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
                                            <center><button type="button" class="btn-modal" onclick="openCamera()"><i class="fa fa-camera me-1"></i>Ouvrir la caméra</button></center>
                                            {{-- <video id="video" width="640" height="480" autoplay></video>
                                            <button type="button" onclick="capturePhoto()">Capturer la photo</button>
                                            <canvas id="canvas" width="640" height="480" style="display:none;"></canvas> --}}
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
                    
                </div>
           
        
        </div>
    </div>
{{-- <script>
    function openCamera() {
        const video = document.getElementById('video');
        navigator.mediaDevices.getUserMedia({ video: true })
            .then(stream => {
                video.srcObject = stream;
            })
            .catch(err => {
                console.error("Erreur lors de l'accès à la caméra : ", err);
            });
    }

    function capturePhoto() {
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const context = canvas.getContext('2d');
        
        context.drawImage(video, 0, 0, canvas.width, canvas.height);
        const photoDataUrl = canvas.toDataURL('image/png');
        
        @this.set('photo', photoDataUrl); // Utilisation de @this pour mettre à jour la propriété Livewire
    }
</script> --}}
