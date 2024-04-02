@extends('layouts.template-scolarite')
@section('content')
    <div class="card">
        <div class="card-header card-head">
            <h1 class="bg-card text-center text-white card-head"><i class="fa fa-graduation-cap me-1"></i>Réinscription des étudiants</h1>
        </div>
        <div class="card-body">
            <form action="">
                <div class="row">
                    <div class="col-md-4 mt-1">
                        <input class="form-control border-input" type="text" name="inerecherche" id="floatinginerecherche" placeholder="Entrez l'INE de l'étudiant">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn-modal"><i class="fa fa-search"></i>Rechercher</button>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </form>
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
                                    <select class="form-select border-input" name="programme" id="programme">
                                        <option value="">Sélectioner un programme</option>
                                        <option value=""></option>
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
@endsection
