@extends('layouts.template-front-office-back')

@section('content')
    <div class="card">
        <div class="card-header card-head">
            <h1 class="bg-card text-center text-white card-head"><i class="fa fa-photo me-1"></i>Ajout de photo(s) dans l'Album</h1>
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
            <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="row mt-2">
                            <p class="text-muted text-center">Cliquez sur le bouton "Choisir un fichier" pour sélectionner des images.</p>
                            <div class="col">
                                <input class="form-control border-input mt-1" type="file" name="photos[]" id="imageUpload" multiple required>
                                @error('photos.*')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <center><button type="submit" class="btn-modal"><i class="fa fa-upload me-1"></i>Téléverser</button></center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row mt-4">
                    <div class="card">
                        <div class="card card-body">
                            <div class="mt-2">
                                <center>
                                    <div id="imgPreviewContainer" class="d-flex flex-wrap justify-content-center"></div>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function readURL(input, target) {
            if (input.files) {
                target.innerHTML = ''; // Clear previous images
                Array.from(input.files).forEach(file => {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        let img = document.createElement('img');
                        img.src = e.target.result;
                        img.classList.add('img-photo', 'card-photo', 'm-2');
                        img.style.width = '150px'; // Adjust the size as needed
                        target.appendChild(img);
                    }

                    reader.readAsDataURL(file);
                });
            }
        }

        document.getElementById('imageUpload').addEventListener('change', function() {
            var imgPreviewContainer = document.getElementById('imgPreviewContainer');
            readURL(this, imgPreviewContainer);
        });
    </script>
@endsection
