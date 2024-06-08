<div class="card">
    <div class="card-header card-head">
        <h1 class="bg-card text-center text-white card-head"><i class="fa fa-users me-2"></i>Etudiants inscrits & reinscrits</h1>
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
                @if(session()->has('error'))
                    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                        <h5 class="text-center">{{ session('error') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <i class="fa fa-times icon-deleted text-white"></i>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="row mt-3">
                    <div class="col-md-5">
                        <h4 class="label-text"><i class="fa fa-filter me-1"></i>Filtrer la liste par</h4>
                        <input class="form-control border-input" wire:model.live.debounce.200ms="searchEtudiant" type="search" id="searchEtudiant" placeholder="INE, prenom, nom" style="width: 460px" >
                    </div>
                    <div class="col-md-3">
                        <h4 class="label-text"><i class="fa fa-filter me-1"></i>Filtrer par</h4>
                        <select class="form-select border-input @error('promotion_id') is-invalid @enderror" wire:model.live="promotion_id" id="promotion_id">
                            <option value="">Promotion</option>
                            @foreach ($promotions as $promotion)
                                <option value="{{ $promotion->id }}">{{ $promotion->promotion }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 d-flex flex-column align-items-start">
                        <h4 class="label-text"><i class="fa fa-filter me-1"></i>Filtrer par</h4>
                        <select class="form-select border-input @error('annee_universitaire_id') is-invalid @enderror" wire:model.live="annee_universitaire_id" id="annee_universitaire_id">
                            <option value="">Année Univ</option>
                            @foreach ($annee_universitaires as $annee_universitaire)
                                <option value="{{ $annee_universitaire->id }}">{{ $annee_universitaire->session }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-md-2 py-5 mb-3">
                        <a href="{{route('scolarite.print.form')}} " class="btn-modal"><i class="fa fa-print me-1" ></i>Imprimer la liste</a>
                    </div>
                </div>
                <div class="row mt-4 table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>INE</th>
                                <th>Prénoms</th>
                                <th>Nom</th>
                                <th>Promotion</th>
                                <th>Programme</th>
                                <th>Niveau</th>
                                <th>Promotion</th>
                                <th>Année Universitaire</th>
                                <th>Photo</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($inscriptions as $k => $inscription)
                            <tr>
                                <th>{{ $k+1 }}</th>
                                <th>{{ $inscription->etudiant->ine}}</th>
                                <td>{{ $inscription->etudiant->prenom}}</td>
                                <td>{{ $inscription->etudiant->nom}}</td>
                                <td>{{ $inscription->programme->departement->departement}}</td>
                                <td>{{ $inscription->programme->programme}}</td>
                                <td>{{ $inscription->niveau->niveau}}</td>
                                <td>{{ $inscription->promotion->promotion}}</td>
                                <td>{{ $inscription->annee_universitaire->session}}</td>
                                <td><img style="object-fit: cover;" width="40px" height="40px" src="{{ asset('storage/'.$inscription->etudiant->photo) }}" alt=""></td>
                                <td class="text-center">
                                    <a href="{{ route('scolarite.inscription.edit', $inscription) }}"><i class="fa fa-edit btn-color-primary"></i></a>
                                    <a href="{{ route('scolarite.etudiant.documents', $inscription->etudiant) }}"><i class="fa fa-eye btn-color-primary"></i></a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#verticalycentered2{{ $inscription->id }}" wire:click='delete({{ $inscription->id }})' wire:confirm="Est ce que vous voulez supprimé cette inscription ?"><i class="fa fa-trash text-danger"></i></a>
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
                </div>
                <div class="d-flex justify-content-end">
                    {{ $inscriptions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
