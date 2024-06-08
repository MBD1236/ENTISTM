@extends('layouts/template-scolarite')

@section('content')

<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-10 bg-card">
            <div class="card mt-1">
                <div class="card-header">
                    <h4 class="fw-bold">Sélectionner le programme, l'année universitaire</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('scolarite.print.oriente') }}">
                        @csrf
    
                        <div class="form-group row my-2">
                            <label for="programme" class="col-md-4 col-form-label text-md-right fs-5">Selectiner le programme <span class="text-danger">*</span></label>
                            <div class="col-md-7">
                                <select id="programme" class="select2 custom-select2 form-control @error('programme') is-invalid @enderror" name="programme">
                                    <option value="">Sélectionner le programme</option>
                                    @foreach($programmes as $programme)
                                        <option value="{{ $programme->programme }}">{{ $programme->programme }}</option>
                                    @endforeach
                                </select>
                                @error('programme')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row my-3">
                            <label for="annee_universitaire" class="col-md-4 col-form-label text-md-right fs-5">Selectionner une année univ <span class="text-danger">*</span></label>
                            <div class="col-md-7">
                                <select id="annee_universitaire" class="select2 custom-select2 form-control @error('annee_universitaire') is-invalid @enderror" name="annee_universitaire">
                                    <option value="">Selectionner une année universitaire</option>
                                    @foreach($annee_universitaires as $annee_universitaire)
                                        <option value="{{ $annee_universitaire->session }}">{{ $annee_universitaire->session  }}</option>
                                    @endforeach
                                </select>
                                @error('annee_universitaire')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group mb-3">
                            <div class="col-md-6 offset-md-4 mt-3">
                                <button type="submit" class="btn btn-modal text-white fs-5 " style="background: #120a5c">
                                    <i class="fa fa-print me-1" ></i>
                                    Imprimer la liste maintenant
                                </button>
                            </div>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // pour le temps d'affichage
    setTimeout(function() {
        document.getElementById('sm').style.display = 'none';
    }, 5000);
</script>

<script>
    // pour l'initialisation de select2
    $(document).ready(function() {
        $('.select2').select2({
            // placeholder: 'Sélectionner le programme',
            allowClear: true 
        });
    });
</script>

@endsection
