<div class="card">
    <div class="card-header card-head">
        <h1 class="bg-card text-center text-white card-head"><i class="fa fa-users me-1"></i>Liste des étudiants orientés</h1>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="">
                @if(session()->has('success'))
                    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                        <h5 class="text-center">{{ session('success') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <i class="fa fa-check icon-deleted text-white"></i>
                    </div>
                @endif
            </div>
            <div class="">
                @if(session()->has('danger'))
                    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                        <h5 class="text-center">{{ session('danger') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <i class="fa fa-warning icon-deleted text-white"></i>
                    </div>
                @endif
            </div>
            <div class="row my-3">
                <div class="col-md-6">
                    <form action="" wire:submit='importer'>
                        <div class="row">
                            <h4 class="label-text"><i class="fa fa-file me-1"></i>Importer la liste des étudiants orientés</h4>
                            <div class="col-md-9">
                                <input class="form-control border-input mt-1" type="file" wire:model="fichier">
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn-modal"><i class="fa fa-upload me-1"></i>Téléverser</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <h4 class="label-text"><i class="fa fa-filter me-1"></i>Filtrer la liste par </h4>
                        <div class="col-md-8">
                            <input class="form-control border-input" type="search" wire:model.live.debounce.200ms='searchIne' id="searchIne" placeholder="INE, Nom, Programme, Session">
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <h4 class="label-text"><i class="fa fa-filter me-1"></i>Filtrer la liste</h4>
                                <div class="col-md-6">
                                    <input class="form-control border-input" type="search" wire:model.live.debounce.200ms='searchIne' id="searchIne" placeholder="Selon un critère">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <a href="" class="btn-modal"><i class="fa fa-print me-1"></i>Imprimer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row mt-3 table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>INE</th>
                                        <th>Nom</th>
                                        <th>Prénoms</th>
                                        <th>Profil</th>
                                        <th>Session</th>
                                        <th>Ecole d'origine</th>
                                        <th>Centre d'examen</th>
                                        <th>Programme</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ( $etudiants as $k => $etudiant)
                                    <tr>
                                        <th>{{ $k+1 }}</th>
                                        <th>{{ $etudiant->ine }}</th>
                                        <td>{{ $etudiant->nom}}</td>
                                        <td>{{ $etudiant->prenom}}</td>
                                        <td>{{ $etudiant->profil}}</td>
                                        <td>{{ $etudiant->session}}</td>
                                        <td>{{ $etudiant->ecole_origine}}</td>
                                        <td>{{ $etudiant->centre}}</td>
                                        <td>{{ $etudiant->programme}}</td>
                                        <td class="text-center">
                                            <a href="{{ route('scolarite.etudiant.edit', $etudiant) }}"><i class="fa fa-edit btn-color-primary"></i></a>
                                            <a href="" data-bs-toggle="modal" data-bs-target="#verticalycentered2{{ $etudiant->id }}" wire:click='delete({{ $etudiant->id }})' wire:confirm="Est ce que vous voulez supprimé cet etudiant ?""><i class="fa fa-trash text-danger"></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="10">
                                            <div class="alert alert-primary">Aucune donnée ne correspond à cette recherche !</div>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        <div class="col-md-4 mt-2">
                            <a href="{{route('scolarite.print.forms')}}" class="btn-modal"><i class="fa fa-print me-1"></i>Imprimer la liste</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


