@extends('layouts.template-front-office-back')

@section('content')
    <div class="card">
        <div class="card-header card-head">
            <h1 class="bg-card text-center text-white card-head">
                <i class="fa fa-envelope me-1"></i>Envoyer une Newsletter
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
            <form action="{{ route('send.newsletter') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="label-control label-text" for="subject">Sujet:</label>
                    <input type="text" class="form-control border-input" id="subject" name="subject" required>
                </div>
                <div class="form-group">
                    <label class="label-control label-text" for="message">Message:</label>
                    <textarea class="form-control border-input" id="message" name="message" style="height: 400px;" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn-modal mt-2"><i class="fa fa-send"></i> Envoyer</button>
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
