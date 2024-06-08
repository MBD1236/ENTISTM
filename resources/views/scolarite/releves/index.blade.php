@extends('layouts.template-scolarite')

@section('content')

<div class="card">
    <div class="card-header card-head">
        <h1 class="bg-card text-center text-white card-head"><i class="fa fa-users me-2"></i>Liste des réléves de notes des étudiants</h1>
    </div>
    <div class="row px-3">
        @if(session()->has('success'))
            <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                <h5 class="text-center">{{ session('success') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <i class="fa fa-check icon-deleted text-white"></i>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-5"></div>
        <div class="col-7">
            <form method="get" action="{{ route('scolarite.releve.create') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6 my-4">
                        <div class="form-group">
                            <select id="etudiant" class="select2 custom-select2 form-control @error('etudiant') is-invalid @enderror" name="etudiant">
                                <option value="">Rechercher le matricule et verifier </option>
                                @foreach($etudiants as $etudiant)
                                    <option value="{{ $etudiant->id }}">{{ $etudiant->ine }}</option>
                                @endforeach
                            </select>
                            @error('etudiant')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <button type="submit" class="text-white fs-5 px-4 py-2 rounded" style="background: #120a5c">
                            <i class="fa fa-plus me-2" ></i>
                            Générer un relevé
                        </button>
                    </div>
                </div>
            </form> 
        </div> 
    </div>
    <div class="card-body">
        <div class="row mt-3">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>N° Reff</th>
                        <th>INE</th>
                        <th>Prénoms</th>
                        <th>Nom</th>
                        <th>Téléphone</th>
                        <th>Programme</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($relevenotes as $k => $relevenote)
                    <tr>
                        <td>{{ $k+1 }}</td>
                        <td>{{ $relevenote->reference->numero }}</td>
                        <td>{{ $relevenote->ine }}</td>
                        <td>{{ $relevenote->prenom }}</td>
                        <td>{{ $relevenote->nom }}</td>
                        <td>{{ $relevenote->telephone }}</td>
                        <td>{{ $relevenote->programme }}</td>
                        <td class="p-1 d-flex gap-1 justify-content-end ">
                            {{-- <a href="{{ route('scolarite.releve.edit', $relevenote) }}" ><i class="bi bi-pencil-square cprimary"></i></a> --}}
                            <a href="{{ route('scolarite.releve.edit', $relevenote->id) }}"><i class="bi bi-pencil-square cprimary"></i></a>

                            <!-- Bouton pour déclencher le modal de confirmation -->
                            <a href="" type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered{{$k}}">
                                <i class="bi bi-trash cdanger"></i>
                            </a>
                            <!-- Modale de confirmation -->
                            <div class="modal fade" id="verticalycentered{{$k}}" tabindex="-1" aria-labelledby="confirmationModalLabel{{$k}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header bg-card text-white p-2 px-4">
                                        <h6 class="modal-title fs-5" id="confirmationModalLabel{{$k}}">Confirmez-vous cette suppression !</h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>       
                                    </div>
                                    <div class="modal-body d-flex flex-column align-items-center gap-2">
                                        <i class="fa fa-warning text-danger fs-1"></i>
                                        <b>Etes-vous sûr de vouloir supprimer <i class="fa fa-trash cdanger"></i> cette relevenote ???</b>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" style="background: #120a5c">Non</button>
                                        <!-- Formulaire de suppression -->
                                        <form action="{{ route('scolarite.releve.destroy', $relevenote)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Oui</button>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div><!-- End Vertically centered Modal-->
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">
                            <div class="alert bg-card text-center fw-bold text-white fs-4">Aucune donnée ne correspond à cette recherche !</div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
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