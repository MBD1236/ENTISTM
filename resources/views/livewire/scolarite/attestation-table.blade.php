<div class="card">
    <div class="card-header card-head">
        <h1 class="bg-card text-white card-head d-flex flex-row justify-content-between">
            <div> 
                <i class="fa fa-list me-2"></i>
                <span>Les attestations</span>
            </div>
            <div>
                <i class="fa fa-list-ol"></i>
                <span class="bg-card text-white card-head">{{$total}}</span>
            </div>
        </h1>
    </div>

    <div class="row px-4">
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

    <div class="card-body mt-4">
        <h4 class="label-text"><i class="fa fa-filter me-1"></i>Filtrer la liste par </h4>
        <div class="row d-flex flex-row justify-content-center">
            <div class="col-md-4 col-lg-4 col-sm-12 mt-2 p-1">
                <select class="form-select border-input" type="search" wire:model.live='programme'>
                    <option value="0">Programme</option>
                    @foreach ($programmes as $programme)
                    <option value="{{ $programme->id }}" wire:key="{{ $programme->id }}">{{ $programme->programme }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 col-lg-2 col-sm-12 mt-2 p-1">
                <select class="form-select border-input" type="search" wire:model.live='niveau'>
                    <option value="0">Niveau</option>
                    @foreach ($niveaux as $niveau)
                        <option value="{{ $niveau->id }}">{{ $niveau->niveau }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="col-md-3 col-lg-3 col-sm-12 mt-2 p-1">
                <select class="form-select border-input" type="search" wire:model.live='annee_universitaire'>
                    <option value="0">Année universitaire</option>
                    @foreach ($annee_universitaires as $annee_universitaire)
                        <option value="{{ $annee_universitaire->id }}">{{ $annee_universitaire->session }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 col-sm-12 d-flex justify-content-end mt-2 p-1">
                <a href="{{ route('scolarite.attestation.create')}}" class="btn-modal pb-2 pt-1 "><i class="fa fa-plus me-1"></i><span>Add New attestation</span></a>
            </div>
        </div>            
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row mt-4">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Reff</th>
                            <th>Type</th>
                            <th>INE</th>
                            <th>prénom et Nom</th>
                            <th>Niveau</th>
                            <th>Session</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    {{-- @php
                        $numero = 1
                    @endphp --}}
                    <tbody>
                    @foreach ($attestations as $k => $attestation)
                            <tr>
                            <td>{{$attestation->$k+1}} </td>
                            <td>{{$attestation->reff}} </td>
                            <td>{{$attestation->type}} </td>
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
                                        <div class="modal-header bg-primary text-white p-2 px-4">
                                            <h6 class="modal-title" id="confirmationModalLabel{{$k}}">Confirmez-vous cette suppression !</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>       
                                        </div>
                                        <div class="modal-body d-flex flex-column align-items-center gap-2">
                                            <i class="fa fa-warning text-danger fs-1"></i>
                                            <b>Etes-vous sûr de vouloir supprimer <i class="fa fa-trash cdanger"></i> cette attestation ???</b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Non</button>
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
                    @endforeach
                    </tbody>
                    
                </table>
            </div>
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
