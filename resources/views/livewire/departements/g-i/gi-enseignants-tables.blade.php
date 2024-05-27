<div>
    <div class="card">
        <div class="card-header card-head">
            <h1 class="bg-card text-center text-white card-head"><i class="fa fa-users me-3"></i>Liste des enseignants</h1>
        </div>
       <div class="card-body">
            <div class="table-responsive-sm">
                <table id="tableau" class="table table-hover table-centered table-bordered mb-0 mt-4">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Adresse</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($enseignants as $k => $enseignant)
                            <tr wire:key="{{ $enseignant->id }}">
                                <td class="fw-bold">{{ $k+1 }}</td>
                                <td class="fw-bold">{{ $enseignant->matricule }}</td>
                                <td>{{ $enseignant->nom }}</td>
                                <td>{{ $enseignant->prenom }}</td>
                                <td>{{ $enseignant->telephone }}</td>
                                <td>{{ $enseignant->email }}</td>
                                <td>{{ $enseignant->adresse }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
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
