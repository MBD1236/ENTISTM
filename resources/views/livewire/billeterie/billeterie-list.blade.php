<div>
    <div class="card">
        <div class="card-header card-head">
            <h1 class="bg-card text-center text-white card-head"><i class="fa fa-users me-3"></i>Liste de tous les billets enregistrés</h1>
            @if(session('success'))
            <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('danger'))
                <div class="alert alert-danger text-center">
                    {{ session('danger') }}
                </div>
            @endif
        </div>
        <script>
            // pour l'initialisation de select2
            $(document).ready(function() {
                $('.select2').select2({
                    allowClear: true
                });
            });
        </script>
        <div class="card-body">
            <div class="table-responsive-sm">
                <table id="tableau" class="table table-hover table-centered table-bordered mb-0 mt-4">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Numéro réçu</th>
                            <th>Matricule</th>
                            <th>Prénom et Nom</th>
                            <th>Nature du réçu</th>
                            <th>Mode de règlement</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($recus as $k => $recu)
                            <tr wire:key="{{ $recu->id }}">
                                <td class="fw-bold">{{ $k+1 }}</td>
                                <td class="fw-bold">{{ $recu->numerorecu }}</td>
                                <td>{{ $recu->etudiant->ine }}</td>
                                <td>{{ $recu->etudiant->prenom }} {{ $recu->etudiant->nom }}</td>
                                <td>{{ $recu->natureRecu->nature }}</td>
                                <td>{{ $recu->modereglement }}</td>
                                <td class="p-1 d-flex gap-1 justify-content-end gap-2 ">
                                    <a href="{{ route('billeterie.edit', $recu) }}" ><i class="bi bi-pencil-square cprimary"></i></a>
                                    
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
                                                <b>Etes-vous sûr de vouloir supprimer <i class="fa fa-trash cdanger"></i> ce réçu ???</b>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn non text-white p-2" data-bs-dismiss="modal">Non</button>
                                                <!-- Formulaire de suppression -->
                                                <form action="{{ route('billeterie.destroy', $recu->id) }}" method="post">
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
                                <td colspan="7">
                                    <div class="alert bg-card text-center fw-bold text-white fs-4">Aucune donnée à afficher !</div>
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
                        {{$recus->links('vendor.livewire.bootstrap')}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
