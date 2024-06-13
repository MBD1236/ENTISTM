@extends('layouts/template-scolarite')

@section('content')

<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-10 bg-card">
            <div class="card mt-1">
                @if(session()->has('error'))
                    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                        <h5 class="text-center">{{ session('error') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <i class="fa fa-check icon-deleted text-white"></i>
                    </div>
                @endif
                <div class="card-header">
                    <h4 class="fw-bold">Sélectionner le matricule et le semestre</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('scolarite.print.indexreleve') }}">
                        @csrf
                        <div class="form-group row my-2">
                            <label for="matricule" class="col-md-4 col-form-label text-md-right fs-5">Sélectionner le matricule <span class="text-danger">*</span></label>
                            <div class="col-md-7">
                                <select id="matricule" class="select2 form-control @error('matricule') is-invalid @enderror" name="matricule" style="border: 0.2em solid #120a5c">
                                    <option value="">Sélectionner le matricule</option>
                                    @foreach($etudiants as $etudiant)
                                        <option value="{{ $etudiant->ine }}">{{ $etudiant->ine }} - {{ $etudiant->prenom }} {{ $etudiant->nom }}</option>
                                    @endforeach
                                </select>
                                @error('matricule')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row my-3">
                            <label for="semestre_id" class="col-md-4 col-form-label text-md-right fs-5">Sélectionner le semestre <span class="text-danger">*</span></label>
                            <div class="col-md-7">
                                <select id="semestre_id" class="border-input form-control @error('semestre_id') is-invalid @enderror" name="semestre_id" style="border: 0.2em solid #120a5c">
                                    <option value="">Sélectionner le semestre</option>
                                    @foreach($semestres as $semestre)
                                        <option value="{{ $semestre->id }}">{{ $semestre->semestre }}</option>
                                    @endforeach
                                </select>
                                @error('semestre_id')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="col-md-6 offset-md-4 mt-3">
                                <button type="submit" class="btn btn-modal text-white fs-5" style="background: #120a5c">
                                    <i class="fa fa-print me-1"></i>
                                    Imprimer le relevé maintenant
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
    // pour l'initialisation de select2
    $(document).ready(function() {
        $('.select2').select2({
            // placeholder: 'Sélectionner le programme',
            allowClear: true 
        });
    });
</script>

@endsection
