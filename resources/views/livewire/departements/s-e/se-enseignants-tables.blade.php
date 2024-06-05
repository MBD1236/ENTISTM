<div>
    <div class="card">
        <div class="card-header card-head">
            <h1 class="bg-card text-center text-white card-head"><i class="fa fa-users me-3"></i>La liste des enseignants du département</h1>
        </div>
        <div class="d-flex flex-row justify-content-end px-2 pb-2">
            <a href="{{ route('scienceenergie.enseignant.create')}}" class="btn-modal">
                <i class="fa fa-plus me-1"></i>
                <span>Ajouter un enseigant</span>
            </a>
        </div>
        @if(session('success'))
            <div class="alert alert-success text-center">
                {{session('success')}}
            </div>
        @endif
       <div class="card-body">
            <div class="table-responsive-sm">
                <table id="tableau" class="table table-hover table-centered table-bordered mb-0 mt-4">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Département</th>
                            {{-- <th>Photo</th> --}}
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($enseignants as $k => $enseignant)
                        <tr wire:key="{{ $enseignant->id }}">
                            <td>{{ $k+1 }}</td>
                            <td>{{ $enseignant->matricule}}</td>
                            <td>{{ $enseignant->nom}}</td>
                            <td>{{ $enseignant->prenom}}</td>
                            <td>{{ $enseignant->departement->departement}}</td>
                            {{-- <td><img width="40px" height="30px" src="{{asset('storage/'.$enseignant->photo) }}" alt="PHOTO"></td> --}}
                            <td class="p-1 d-flex gap-1 justify-content-end gap-2 ">
                                <a href="{{ route('scienceenergie.enseignant.show', $enseignant) }}" ><i class="bi bi-eye-fill cprimary"></i></a>
                                <a href="{{ route('scienceenergie.enseignant.edit', $enseignant) }}" ><i class="bi bi-pencil-square cprimary"></i></a>
                                
                                <!-- Bouton pour déclencher le modal de confirmation -->
                                <a href="" type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered{{$k}}">
                                    <i class="bi bi-trash cdanger"></i>
                                </a>
                                <!-- Modale de confirmation -->
                                <div class="modal fade" id="verticalycentered{{$k}}" tabindex="-1" aria-labelledby="confirmationModalLabel{{$k}}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                        <div class="modal-header  text-white p-2 px-4">
                                            <h6 class="modal-title" id="confirmationModalLabel{{$k}}">Confirmez-vous cette suppression !</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>       
                                        </div>
                                        <div class="modal-body d-flex flex-column align-items-center gap-2">
                                            <i class="fa fa-warning text-danger fs-1"></i>
                                            <b>Etes-vous sûr de vouloir supprimer <i class="fa fa-trash cdanger"></i> cet enseignant ???</b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn non text-white p-2" data-bs-dismiss="modal">Non</button>
                                            <!-- Formulaire de suppression -->
                                            <form action="{{ route('scienceenergie.enseignant.destroy', $enseignant->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger p-2">Oui</button>
                                            </form>
                                        </div>
                                      </div>
                                    </div>
                                </div><!-- End Vertically centered Modal-->
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div class="alert alert-info text-center fw-bold">Aucune donnée à afficher !</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>  
                </table>
            </div>
        </div>
        <div class="card-footer mt-1">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <ul class="pagination-rounded">
                        {{$enseignants->links('vendor.livewire.bootstrap')}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

