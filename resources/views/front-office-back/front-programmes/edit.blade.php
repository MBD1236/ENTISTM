@extends('layouts.template-front-office-back')

@section('content')
    <div class="card">
        <div class="card-header card-head">
            <h1 class="bg-card text-center text-white card-head">
                <i class="fa fa-edit me-1"></i>Modifier un programme sur le fil de l'actualité
            </h1>
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
            <form action="{{ route('frontprogramme.update', $frontProgramme->id) }}" method="POST" enctype="multipart/form-data" id="programmeForm">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input class="form-control border-input" value="{{ old('intitule_programme', $frontProgramme->intitule_programme) }}" type="text" name="intitule_programme" id="floatingintitule_programme" placeholder="Intitulé du programme" required>
                            <label for="floatingintitule_programme" class="label-control label-text">Intitulé du programme<span class="text-danger">*</span></label>
                            @error('intitule_programme')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control border-input" value="{{ old('duree', $frontProgramme->duree) }}" type="text" name="duree" id="floatingduree" placeholder="Durée du programme" required>
                            <label for="floatingduree" class="label-control label-text">Durée du programme<span class="text-danger">*</span></label>
                            @error('duree')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <center>
                            <img id="imgPreview" class="img-photo card-photo" src="{{ $frontProgramme->image_path ? asset('storage/' . $frontProgramme->image_path) : asset('assets/img/téléchargement.png') }}" alt="Emplacement de l'image">
                        </center>
                        <p class="text-muted text-center">Cliquez sur le bouton "Choisir un fichier" pour sélectionner une image (la photo est facultative)</p>
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
                                <center><button type="submit" class="btn-modal" id="submitButton"><i class="fa fa-send me-1"></i>Publier le programme</button></center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <select class="form-select border-input" name="type_programme" id="type_programme" required>
                                <option value="">Sélectionner un type de programme</option>
                                <option value="Licence" {{ old('type_programme', $frontProgramme->type_programme) == 'Licence' ? 'selected' : '' }}>Licence</option>
                                <option value="Master" {{ old('type_programme', $frontProgramme->type_programme) == 'Master' ? 'selected' : '' }}>Master</option>
                            </select>
                            <label for="type_programme" class="label-control label-text">Type de programme<span class="text-danger">*</span></label>
                            @error('type_programme')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control border-input" name="description" id="floatingdescription" placeholder="Saisissez la description du programme ici" style="height: 400px;" required>{{ old('description', $frontProgramme->description) }}</textarea>
                            <label for="floatingdescription" class="label-control label-text">Description<span class="text-danger">*</span></label>
                            @error('description')
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

        document.getElementById('programmeForm').addEventListener('submit', function() {
            document.getElementById('submitButton').disabled = true;
        });
    </script>
@endsection