@extends('layouts.template-scolarite')

@section('content')

<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-10 bg-card">
            <div class="card mt-1">
                <div class="card-header fs-4">Sélectionner le ou les étudiants</div>

                <div class="card-body">
                    @if (session('error'))
                        <div id="sm" class="alert alert-danger text-center fw-bold" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('scolarite.printBadge') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="matricules" class="col-md-4 col-form-label fs-5 text-md-right">Matricules des étudiants</label>
                            <div class="col-md-7">
                                <select id="matricules" class="select2 custom-select2 form-control @error('matricules') is-invalid @enderror" name="matricules[]" multiple>
                                    <option value="">Sélectionner les matricules</option>
                                    @foreach($etudiants as $etudiant)
                                        <option value="{{ $etudiant->ine }}">{{ $etudiant->ine }}</option>
                                    @endforeach
                                </select>                             
                                @error('matricules')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group mb-3">
                            <div class="col-md-6 offset-md-4 mt-3">
                                <button type="submit" class="btn btn-modal text-white fs-5 " style="background: #120a5c">
                                    <i class="fa fa-print me-1" ></i>
                                    Imprimer le.s badge.s
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
            placeholder: 'Sélectionner les matricules',
            allowClear: true 
        });
    });
</script>

@endsection
