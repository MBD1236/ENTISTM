@extends('layouts/template-scolarite')

@section('content')

<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-10 bg-card">
            <div class="card mt-1">
                <div class="card-header">
                    <h4>Sélectionner le.s matricule.s et la nature du réçu</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('billeterie.index') }}">
                        @csrf
                        <div class="form-group row my-2">
                            <label for="matricules" class="col-md-4 col-form-label text-md-right fs-5">Matricules des étudiants <span class="text-danger">*</span></label>
                            <div class="col-md-7">
                                <select id="matricules" class="select2 custom-select2 form-control @error('matricules') is-invalid @enderror" name="matricules[]" multiple>
                                    <option value="">Sélectionner le.s matricule.s</option>
                                    @foreach($etudiants as $etudiant)
                                        <option value="{{ $etudiant->ine }}">{{ $etudiant->ine }}</option>
                                    @endforeach
                                </select>
                                @error('matricules')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row my-3">
                            <label for="nature" class="col-md-4 col-form-label text-md-right fs-5">Nature du réçu <span class="text-danger">*</span></label>
                            <div class="col-md-7">
                                <select id="nature" class="select2 custom-select2 form-control @error('nature') is-invalid @enderror" name="nature">
                                    <option value="">Sélectionner la nature du réçu</option>
                                    @foreach($natures as $nature)
                                        <option value="{{ $nature->nature }}">{{ $nature->nature }}</option>
                                    @endforeach
                                </select>
                                @error('nature')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="col-md-6 offset-md-4 mt-3">
                                <button type="submit" class="btn btn-modal text-white fs-5 " style="background: #120a5c">
                                    <i class="fa fa-print me-1" ></i>
                                    Imprimer le.s réçu.s
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
            placeholder: 'Sélectionner le.s matricule.s',
            allowClear: true 
        });
    });
</script>

@endsection
