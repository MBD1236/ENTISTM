@extends('layouts.my')

@section('content')

<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sélectionner un enseignant</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('printBadge') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="matricules" class="col-md-4 col-form-label text-md-right">Matricules des enseignants</label>
                        
                            <div class="col-md-6">
                                <select id="matricules" class="select2 js-states form-control @error('matricules') is-invalid @enderror" name="matricules[]" multiple>
                                    <option value="" class="my-2">Sélectionner les matricules</option>
                                    @foreach($enseignants as $enseignant)
                                        <option value="{{ $enseignant->matricule }}" >{{ $enseignant->matricule }}</option>
                                    @endforeach
                                </select>
                                @error('matricules')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 mt-3">
                                <button type="submit" class="btn btn-primary">
                                    Imprimer Badge
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

  
@endsection
