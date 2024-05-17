@extends('layouts.template-scolarite')

@section('content')

<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Sélectionner le ou les étudiants</div>

                <div class="card-body">
                    @if (session('error'))
                        <div id="sm" class="alert alert-danger text-center fw-bold" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('scolarite.printBadge') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="matricules" class="col-md-4 col-form-label text-md-right">Matricules des étudiants</label>
                        
                            <div class="col-md-7">
                                <select id="matricules" class="select2 js-states form-control @error('matricules') is-invalid @enderror" name="matricules[]" multiple>
                                    <option value="" class="my-2">Sélectionner les matricules</option>
                                    @foreach($etudiants as $etudiant)
                                        <option value="{{ $etudiant->ine }}" >{{ $etudiant->ine }}</option>
                                    @endforeach
                                </select>
                                @error('matricules')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 mt-3">
                                <button type="submit" class="btn btn-modal">
                                    Imprimer le.s badge.s
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        setTimeout(fun(){
            getelementById('#sm').fadeOut();
        }, 5000);
    </script>
</div>


@endsection
