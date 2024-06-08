@extends('layouts.template-front-office-back')

@section('content')
    <div class="card">
        <div class="card-header card-head">
            <h1 class="bg-card text-center text-white card-head"><i class="fa fa-send me-1"></i>Publier un Témoignage</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    @if(session()->has('info'))
                        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                            <h5 class="text-center">{{ session('info') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <i class="fa fa-check icon-deleted text-white"></i>
                        </div>
                    @endif
                </div>
                <div class="col-md-3"></div>
            </div>
            <form action="{{ route('temoignages.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input class="form-control border-input" value="{{ old('nom') }}" type="text" name="nom" id="floatingnom" placeholder="nom">
                            <label for="floatingnom" class="label-control label-text">Nom<span class="text-danger">*</span></label>
                            @error('nom')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <div class="mt-2">
                                <div class="form-floating mb-3">
                                    <input class="form-control border-input" value="{{ old('fonction') }}" type="text" name="fonction" id="floatingfonction" placeholder="Fonction">
                                    <label for="floatingfonction" class="label-control label-text">Fonction<span class="text-danger">*</span></label>
                                    @error('fonction')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <center><img id="imgPreview" class="img-photo card-photo" src="{{ asset('assets/img/téléchargement.png') }}" alt="Emplacement de l'image"></center>
                                <p class="text-muted text-center">Cliquez sur le bouton "Choisir un fichier" pour sélectionner une image (la photo est facultative)</p>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col">
                                <input class="form-control border-input mt-1" type="file" name="image" id="imageUpload">
                                @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <center><button type="submit" class="btn-modal"><i class="fa fa-send me-1"></i>Publier le témoignage</button></center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input class="form-control border-input" value="{{ old('prenom') }}" type="text" name="prenom" id="floatingprenom" placeholder="Prénom">
                            <label for="floatingprenom" class="label-control label-text">Prénom<span class="text-danger">*</span></label>
                            @error('prenom')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control border-input" value="{{ old('texte') }}" name="texte" id="floatingtexte" placeholder="Saisissez votre texte ici" style="height: 400px;"></textarea>
                            <label for="floatingtexte" class="label-control label-text">Témoignage<span class="text-danger">*</span></label>
                            @error('texte')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function readURL(input, target) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    if (target.tagName === 'IMG') {
                        target.src = e.target.result;
                    }
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        document.getElementById('imageUpload').addEventListener('change', function() {
            var imgPreview = document.getElementById('imgPreview');
            readURL(this, imgPreview);
        });
    </script>
@endsection
