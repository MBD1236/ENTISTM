@extends('layouts.template-front-office-back')

@section('content')
    <div class="card">
        <div class="card-header card-head">
            <h1 class="bg-card text-center text-white card-head"><i class="fa fa-edit me-1"></i>Modifier un Article</h1>
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
            <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input class="form-control border-input" value="{{ $article->titre }}" type="text" name="titre" id="floatingtitre" placeholder="Titre">
                            <label for="floatingtitre" class="label-control label-text">Titre<span class="text-danger">*</span></label>
                            @error('titre')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="image" aria-selected="true"><span class="switch-text">Image</span></button>
                            </li>
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-profile" type="button" role="tab" aria-controls="video" aria-selected="false"><span class="switch-text">Vidéo</span></button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                            <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="mt-2">
                                    <div class="mt-2">
                                        <center><img id="imgPreview" class="img-photo card-photo" src="{{ $article->media && str_contains($article->media, 'image') ? asset('storage/' . $article->media) : asset('assets/img/téléchargement.png') }}" alt="Emplacement de l'image"></center>
                                        <p class="text-muted text-center">Cliquez sur le bouton "Choisir un fichier" pour sélectionner une image</p>
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
                            </div>
                            <div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="mt-2">
                                    <!-- Aperçu de la vidéo -->
                                    <center><video controls class="img-photo card-photo" id="videoPreview">
                                        <source src="{{ $article->media && str_contains($article->media, 'video') ? asset('storage/' . $article->media) : '' }}" type="video/mp4">
                                    </video></center>
                                    <p class="text-muted text-center">Cliquez sur le bouton "Choisir un fichier" pour sélectionner une vidéo</p>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <input class="form-control border-input mt-1" type="file" name="video" id="videoUpload">
                                        @error('video')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <center><button type="submit" class="btn-modal"><i class="fa fa-save me-1"></i>Enregistrer la modification</button></center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input class="form-control border-input" value="{{ $article->description }}" type="text" name="description" id="floatingdescription" placeholder="Description">
                            <label for="floatingdescription" class="label-control label-text">Description<span class="text-danger">*</span></label>
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control border-input" name="texte" id="floatingdetails" placeholder="Saisissez votre texte ici" style="height: 400px;">{{ $article->texte }}</textarea>
                            <label for="floatingdetails" class="label-control label-text">Texte<span class="text-danger">*</span></label>
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
                    } else if (target.tagName === 'VIDEO') {
                        target.src = e.target.result;
                        target.load();
                    }
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        document.getElementById('imageUpload').addEventListener('change', function() {
            var imgPreview = document.getElementById('imgPreview');
            readURL(this, imgPreview);
        });

        document.getElementById('videoUpload').addEventListener('change', function() {
            var videoPreview = document.getElementById('videoPreview');
            readURL(this, videoPreview);
        });
    </script>
@endsection
