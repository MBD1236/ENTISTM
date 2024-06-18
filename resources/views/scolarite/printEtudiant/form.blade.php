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
                    <h4 class="fw-bold">Sélectionner le programme, l'année universitaire et la promotion</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('scolarite.print.index') }}">
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
                        <div class="form-group row my-3">
                            <label for="promotion_id" class="col-md-4 col-form-label text-md-right fs-5">Selectionner une promotion</label>
                            <div class="col-md-7">
                                <select id="promotion_id" class="select2 custom-select2 form-control @error('promotion_id') is-invalid @enderror" name="promotion_id" >
                                    <option value="">Selectionner une promotion</option>
                                    @foreach($promotions as $promotion)
                                        <option value="{{ $promotion->promotion }}">{{ $promotion->promotion  }}</option>
                                    @endforeach
                                </select>
                                @error('promotion_id')
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
