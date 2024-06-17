@extends('layouts.template-scolarite')

@section('content')
    <div class="card">
        <div class="card-header card-head">
            <h1 class="bg-card text-white card-head d-flex flex-row justify-content-between">
                <div class="me-4"> 
                    <i class="fa fa-list me-2"></i>
                    <span>Les attestations d'inscription, de réinscription...</span>
                </div>
                <div>
                    <i class="fa fa-list-ol"></i>
                    <span class="bg-card text-white card-head">{{$total}}</span>
                </div>
            </h1>
        </div>

       <div class="row px-4 text-center">
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            @if(session('danger'))
                <div class="alert alert-danger">
                    {{session('danger')}}
                </div>
            @endif
       </div>

        <div class="card-body my-2">
            <div class="row">
                <div class="col-md-4 col-sm-12 text-end my-2">
                    <h4 class="label-text"><i class="fa fa-filter me-2 p-2"></i>Filtrer les attestations par </h4>
                </div>
                <div class="col-md-5 col-sm-12 my-2">
                    <input type="search" class="border-input form-control" id="searchInput" name="searchInput" class="form-control" placeholder="INE, Prenom, Nom, Programme, Année universitaire, etc" style="height: 45px ; border: 0.2em solid #120a5c">
                </div>
                <div class="col-md-3 col-sm-12 text-start my-3">
                    <a href="{{ route('scolarite.attestation.create')}}" class="btn-modal py-3 px-3"><i class="fa fa-plus me-1"></i><span>Ajouter une attestation</span></a>
                <div>
            </div>
        </div>
        <div class="card-body mt-3">
            <div class="table-responsive-sm">
                <table id="tableau" class="table table-hover table-centered table-bordered mb-0 mt-4">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Reff</th>
                            <th>Type</th>
                            <th>INE</th>
                            <th>Prénom et Nom</th>
                            <th>Niveau</th>
                            <th>Session</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    
                    <tbody id="tableBody">
                        @forelse ($attestations as $k => $attestation)
                            <tr>
                                <td>{{$k+1}} </td>
                                <td>{{$attestation->reference->numero}} </td>
                                <td>{{ucwords(strtolower($attestation->attestation_type->type))}} </td>
                                <td>{{$attestation->etudiant->ine}} </td>
                                <td>{{$attestation->etudiant->prenom}} {{$attestation->etudiant->nom}} </td>
                                <td>{{$attestation->niveau->niveau}} </td>
                                <td>{{$attestation->annee_universitaire->session}} </td>
                                <td class="p-1 d-flex gap-1 justify-content-end ">
                                    <a href="{{ route('scolarite.attestation.edit', $attestation) }}" ><i class="bi bi-pencil-square cprimary"></i></a>
                                    
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
                                                <b>Etes-vous sûr de vouloir supprimer <i class="fa fa-trash cdanger"></i> cette attestation ???</b>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" style="background: #120a5c">Non</button>
                                                <!-- Formulaire de suppression -->
                                                <form action="{{ route('scolarite.attestation.destroy', $attestation)}}" method="post">
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
                                <td colspan="8">
                                    <div class="alert bg-card text-center fw-bold text-white fs-4">Aucune donnée ne correspond à cette recherche !</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                    
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <ul class="pagination-rounded">
                    {{$attestations->links()}}
                </ul>
            </div>
        </div>
    </div>

    <script>
        
    </script>
@endsection
