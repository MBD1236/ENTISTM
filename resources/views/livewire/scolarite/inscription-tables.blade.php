<div class="card">
    <div class="card-header card-head">
        <h1 class="bg-card text-center text-white card-head"><i class="fa fa-users me-1"></i>Etudiants inscrits & reinscrits</h1>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    @if(session()->has('success'))
                        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                            <h5 class="text-center">{{ session('success') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <i class="fa fa-check icon-deleted text-white"></i>
                        </div>
                    @endif
                </div>
               
                <div class="row">
                    <h4 class="label-text"><i class="fa fa-filter me-1"></i>Filtrer la liste</h4>
                    <div class="col-md-3">
                        <input class="form-control border-input" wire:model.live.debounce.200ms="searchEtudiant" type="search" id="searchEtudiant" placeholder="Selon un critère">
                    </div>
                    <div class="col-md-3 mt-2">
                        <a href="{{ route('scolarite.orientation') }}" class="btn-modal"><i class="fa fa-refresh me-1"></i>Actualiser</a>
                        <a href="" class="btn-modal"><i class="fa fa-print me-1"></i>Imprimer</a>
                    </div>
                </div>
                <div class="row mt-4">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>INE</th>
                                <th>Prénoms</th>
                                <th>Nom</th>
                                <th>Departement</th>
                                <th>Programme</th>
                                <th>Niveau</th>
                                <th>Année Universitaire</th>
                                <th>Photo</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($inscriptions as $k => $inscription)
                            <tr>
                                <th>{{ $k+1 }}</th>
                                <td>{{ $inscription->etudiant->ine}}</td>
                                <td>{{ $inscription->etudiant->prenom}}</td>
                                <td>{{ $inscription->etudiant->nom}}</td>
                                <td>{{ $inscription->programme->departement->departement}}</td>
                                <td>{{ $inscription->programme->programme}}</td>
                                <td>{{ $inscription->niveau->niveau}}</td>
                                <td>{{ $inscription->annee_universitaire->session}}</td>
                                <td><img width="50px" src="{{asset('storage/'.$inscription->etudiant->photo) }}" alt="">
                                </td>
                                
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9">
                                    <div class="alert alert-primary">Aucune donnée ne correspond à cette recherche !</div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



