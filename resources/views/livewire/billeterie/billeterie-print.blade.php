<div>
    <div class="card">
        <div class="card-header card-head">
            <h1 class="bg-card text-center text-white card-head"><i class="fa fa-print me-3"></i>Page d'impression des réçus</h1>
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
            <div class="row my-4">
                <!-- Champ de recherche multi-critères -->
               <div class="col-md-8 col-sm-12">
                    <div class="row">
                        <div class="d-flex flex-row justify-content-center gap-2 ">
                            <label for="search" class="my-2 fs-5 fw-bold">Rechercher</label>
                            <input class="form-control border-input" type="text" wire:model.live.debounce.300ms="search" placeholder="Par numéro de réçu, matricule, prénom ou nom de l'étudiant" style="height: 50px; width: 530px">
                        </div>
                    </div>
               </div>
                <div class="col-md-4 col-sm-12 mt-3 ">
                    <a href="{{ route('billeterie.form')}}" class="btn-modal py-3" >
                        <i class="fa fa-print me-1"></i>
                        <span>Imprimer un(plusieurs) réçu(s)</span>
                    </a>
                </div>
                <!-- Fin du champ de recherche multi-critères -->
            </div>
            
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
                                    <a href="{{ route('billeterie.printRecu', $recu) }}" ><i class="bi bi-printer cprimary fs-4 mx-4"></i></a>
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
