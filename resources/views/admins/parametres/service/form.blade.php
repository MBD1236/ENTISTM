@extends('layouts.template-administrateur')

@section('title', $service->exists ? 'Editer un service': 'Ajouter un service')

@section('content')

<div class="card mt-2">
    <div class="card-header card-head">
        <h1 class="bg-card text-center text-white card-head">
            @if ($service->id)
                <i class="bi bi-pencil-square me-2"></i>Modification d'un service
            @else
                <i class="fa fa-plus me-3"></i>Ajouter un service
            @endif
        </h1>
    </div>
    <div class="card-body col-lg-10 m-auto">
        <form class="vstack mt-4  gap-2" action="{{ route($service->exists ? 'admin.service.update': 'admin.service.store', $service) }}" method="post" enctype="multipart/form-data">

            @method($service->exists ? 'put' : 'post')
            @csrf

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control border-input @error('matricule') is-invalid @enderror" type="text" name="matricule" id="floatingmatricule" placeholder="Matricule" value="{{old('matricule', $service->matricule)}}" style="border: 0.2em solid #120a5c">
                        <label for="floatingmatricule">Matricule</label>
                        <div class="invalid-feedback">@error('matricule') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control border-input @error('nom') is-invalid @enderror" type="text" name="nom" id="floatingnom" placeholder="Nom" value="{{old('nom', $service->nom)}}" style="border: 0.2em solid #120a5c">
                        <label for="floatingnom">Prénom et Nom du chef de service</label>
                        <div class="invalid-feedback">@error('nom') {{ $message }} @enderror</div>
                    </div>
                </div>
               
                <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control border-input @error('telephone') is-invalid @enderror" type="tel" name="telephone" id="floatingTel" placeholder="+224623229188" value="{{old('telephone', $service->telephone)}}" style="border: 0.2em solid #120a5c">
                        <label for="floatingTel">Téléphone</label>
                        <div class="invalid-feedback">@error('telephone') {{ $message }} @enderror</div>
                    </div>
                </div>
            
                <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control border-input @error('email') is-invalid @enderror" type="email" name="email" id="floatingInput" placeholder="diallo@gmail.com" value="{{old('email', $service->email)}}" style="border: 0.2em solid #120a5c">
                        <label for="floatingInput">Email</label>
                        <div class="invalid-feedback">@error('email') {{ $message }} @enderror</div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control border-input @error('fonction') is-invalid @enderror" type="text" name="fonction" id="floatingfonction" placeholder="Code service" value="{{old('fonction', $service->fonction)}}" style="border: 0.2em solid #120a5c">
                        <label for="floatingfonction">Fonctions</label>
                        <div class="invalid-feedback">@error('fonction') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control border-input @error('nomservice') is-invalid @enderror" type="text" name="nomservice" id="floatingnomservice" placeholder="Code service" value="{{old('nomservice', $service->nomservice)}}" style="border: 0.2em solid #120a5c">
                        <label for="floatingnomservice">Nom du service</label>
                        <div class="invalid-feedback">@error('nomservice') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control border-input @error('sigle') is-invalid @enderror" type="sigle" name="sigle" id="floatingsigle" placeholder="sigle" value="{{old('sigle', $service->sigle)}}" style="border: 0.2em solid #120a5c">
                        <label for="floatingsigle">Sigle / Abregé </label>
                        <div class="invalid-feedback">@error('sigle') {{ $message }} @enderror</div>
                    </div>
                </div>

                <div class="col-md-5 col-ms-12 my-3">
                    <button type="submit" class="btn-modal p-2 px-5">
                        @if ($service->id) 
                            <i class="bi bi-pencil-square me-2"></i>
                            Modifier un service
                        @else 
                            <i class="fa fa-plus me-2"></i>
                            Créer un nouveau service
                        @endif
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
