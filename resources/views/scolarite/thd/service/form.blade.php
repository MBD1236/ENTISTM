@extends('backoffice.home')

@section('title', $service->exists ? 'Editer un service': 'Ajouter un service')

@section('content')
<div class="pagetitle">
    <h1>@yield('title')</h1>
</div>
<div class="card mt-2">
    <div class="card-body col-lg-10 m-auto">
        <form class="vstack mt-4  gap-2" action="{{ route($service->exists ? 'admin.service.update': 'admin.service.store', $service) }}" method="post" enctype="multipart/form-data">

            @method($service->exists ? 'put' : 'post')
            @csrf

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('matricule') is-invalid @enderror" type="text" name="matricule" id="floatingmatricule" placeholder="Matricule" value="{{old('matricule', $service->matricule)}}">
                        <label for="floatingmatricule">Matricule</label>
                        <div class="invalid-feedback">@error('matricule') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom" id="floatingnom" placeholder="Nom" value="{{old('nom', $service->nom)}}">
                        <label for="floatingnom">Prénom et Nom du chef de service</label>
                        <div class="invalid-feedback">@error('nom') {{ $message }} @enderror</div>
                    </div>
                </div>
               
                <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('telephone') is-invalid @enderror" type="tel" name="telephone" id="floatingTel" placeholder="+224623229188" value="{{old('telephone', $service->telephone)}}">
                        <label for="floatingTel">Téléphone</label>
                        <div class="invalid-feedback">@error('telephone') {{ $message }} @enderror</div>
                    </div>
                </div>
            
                <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="floatingInput" placeholder="diallo@gmail.com" value="{{old('email', $service->email)}}">
                        <label for="floatingInput">Email</label>
                        <div class="invalid-feedback">@error('email') {{ $message }} @enderror</div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('fonction') is-invalid @enderror" type="text" name="fonction" id="floatingfonction" placeholder="Code service" value="{{old('fonction', $service->fonction)}}">
                        <label for="floatingfonction">Fonctions</label>
                        <div class="invalid-feedback">@error('fonction') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('nomservice') is-invalid @enderror" type="text" name="nomservice" id="floatingnomservice" placeholder="Code service" value="{{old('nomservice', $service->nomservice)}}">
                        <label for="floatingnomservice">Nom du service</label>
                        <div class="invalid-feedback">@error('nomservice') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('sigle') is-invalid @enderror" type="sigle" name="sigle" id="floatingsigle" placeholder="sigle" value="{{old('sigle', $service->sigle)}}">
                        <label for="floatingsigle">Sigle / Abregé </label>
                        <div class="invalid-feedback">@error('sigle') {{ $message }} @enderror</div>
                    </div>
                </div>

                <div class="col-5 my-3">
                    <button type="submit" class="btn btn-primary p-2">
                        @if ($service->id) Modifier un service
                        @else Créer un nouveau service
                        @endif
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
