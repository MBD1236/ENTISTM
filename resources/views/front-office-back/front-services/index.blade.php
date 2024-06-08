@extends('layouts.template-front-office-back')

@section('content')
    <div class="card">
        <div class="card-header card-head">
            <h1 class="bg-card text-center text-white card-head"><i class="fa fa-university me-1"></i>Ajout d'un service</h1>
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
            <form action="{{ route('frontservice.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input class="form-control border-input" value="{{ old('nomservice') }}" type="text" name="nomservice" id="floatingnomservice" placeholder="Nom service">
                            <label for="floatingnomservice" class="label-control label-text">Nom service<span class="text-danger">*</span></label>
                            @error('nomservice')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <div class="mt-2">
                                <div class="form-floating mb-3">
                                    <input class="form-control border-input" value="{{ old('email') }}" type="email" name="email" id="floatingemail" placeholder="Email">
                                    <label for="floatingemail" class="label-control label-text">Email<span class="text-danger">*</span></label>
                                    @error('email')
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
                                <center><button type="submit" class="btn-modal"><i class="fa fa-save me-1"></i>Enregistrer</button></center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input class="form-control border-input" value="{{ old('tel') }}" type="text" name="tel" id="floatingtelephone" placeholder="Téléphone">
                            <label for="floatingtelephone" class="label-control label-text">Téléphone<span class="text-danger">*</span></label>
                            @error('tel')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control border-input" value="{{ old('texte') }}" name="texte" id="floatingtexte" placeholder="Saisissez la description du service ici" style="height: 400px;"></textarea>
                            <label for="floatingtexte" class="label-control label-text">Description<span class="text-danger">*</span></label>
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
