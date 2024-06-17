<div>
    <div class="card-header card-head">
        <h1 class="bg-card text-center text-white card-head"><i class="fa fa-file me-2"></i>La liste des fichiers partagés</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="mt-2">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            
            <div class="row">
                <div class="col-md-4 col-sm 12 mt-2 p-1">
                    <h4 class="label-text"><i class="fa fa-filter me-1"></i>Filtrer la liste par nom de service </h4>
                </div>
                <div class="col-md-4 col-sm-12 mt-2 p-1">
                    <div class="form-group">
                        <select wire:model.live="service_id" name="service_id" id="service_id" class="form-select border-input @error('service_id') is-invalid @enderror" type="search" style="height: 40px;">
                            <option value="0">Selectionner un nom de service </option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}" wire:key="{{ $service->id }}">{{ $service->nomservice }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">@error('service_id') {{ $message }} @enderror</div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12 mt-2 p-1">
                    <div class="text-end">
                        <a type="button" class="btn-modal px-4" data-bs-toggle="modal" data-bs-target="#ajoutRoles">
                            <i class="fa fa-share"></i>
                            Partager un fichier
                        </a>
                    </div>
                </div>
            </div>

            {{-- Modal pour l'ajout d'un partage_id --}}
            <div class="modal fade" id="ajoutRoles" tabindex="-1" wire:ignore.self>
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header bg-card-modal">
                            <h3 class="modal-title">Partage de fichier </h3>
                            <button type="button" class="bg-btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <form wire:submit.prevent="store" enctype="multipart/form-data">
                                <div class="mt-2">
                                    @if(session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-md-12 my-2">
                                        <label for="type" class="label-control label-text my-2">Nom du service<span class="text-danger">*</span></label>
                                        <div class="form-floating">
                                            <select id="service_id" class="border-input custom-select2 form-control @error('service_id') is-invalid @enderror" wire:model="service_id">
                                                <option value="">Selectionner un nom de service</option>
                                                @foreach($services as $service)
                                                    <option value="{{ $service->id }}">{{ $service->nomservice }}</option>
                                                @endforeach
                                            </select>
                                            @error('service_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <div class="form-floating">
                                            <input class="form-control border-input @error('fichier') is-invalid @enderror" type="file" wire:model="fichier" id="floatingfichier">
                                            <label for="floatingfichier" class="label-control label-text">Selectionner un fichier</label>
                                            <div class="invalid-feedback">@error('fichier') <strong>{{ $message }}</strong> @enderror</div>
                                        </div>
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="submit" class="btn-modal"><i class="fa fa-check me-1"></i>Enregistrer</button>
                                        <button type="button" class=" btn-fermer bg-danger text-white" data-bs-dismiss="modal"><i class="fa fa-times me-1"></i>Fermer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Modal pour la modification d'un cours --}}
            <div class="modal fade" id="modifRoles" tabindex="-1" wire:ignore.self>
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header bg-card-modal">
                            <h3 class="modal-title">Modification d'un fichier à partager</h3>
                            <button type="button" class="bg-btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <form wire:submit.prevent="update" enctype="multipart/form-data">
                                <div class="mt-2">
                                    @if(session()->has('successUpdate'))
                                        <div class="alert alert-success">
                                            {{ session('successUpdate') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-md-12 my-2">
                                        <label for="type" class="label-control label-text my-2">Nom du service<span class="text-danger">*</span></label>
                                        <div class="form-floating">
                                            <select id="service_id" class="border-input custom-select2 form-control @error('service_id') is-invalid @enderror" wire:model="service_id">
                                                <option value="">Selectionner un nom de service</option>
                                                @foreach($services as $service)
                                                    <option value="{{ $service->id }}">{{ $service->nomservice }}</option>
                                                @endforeach
                                            </select>
                                            @error('service_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <div class="form-floating">
                                            <input class="form-control border-input @error('fichier') is-invalid @enderror" type="file" wire:model="fichier" id="floatingTel">
                                            <label for="floatingfichier" class="label-control label-text">Selectionner un fichier</label>
                                            <div class="invalid-feedback">@error('fichier') <strong>{{ $message }}</strong> @enderror</div>
                                        </div>
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="submit" class="btn-modal"><i class="fa fa-check me-1"></i>Modifier</button>
                                        <button type="button" class=" btn-fermer bg-danger text-white" data-bs-dismiss="modal"><i class="fa fa-times me-1"></i>Fermer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- pour la table --}}
        <div class="card-body">
            <div class="row table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nom du service</th>
                            <th>Document partagé</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($partages as $k => $partage)
                        <tr>
                            <td>{{ $k + 1 }}</td>
                            <td>{{ $partage->service->nomservice }}</td>
                            <td>{{ $partage->fichier }}</td>
                            <td class="text-end">
                                <a title="Visualiser le fichier" class="fs-4 me-2" href="{{ Storage::url('public/partagefiles/' . $partage->fichier) }}" target="_blank"><i class="fa fa-eye btn-color-primary"></i></a>
                                <a type="button" title="Modifier" class="fs-5 me-2" wire:click="edit({{ $partage }})" data-bs-toggle="modal" data-bs-target="#modifRoles"><i class="fa fa-edit btn-color-primary"></i></a>
                                <!-- Bouton pour déclencher le modal de confirmation -->
                                <a title="Supprimer" href="" type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered{{$k}}">
                                    <i class="bi bi-trash cdanger"></i>
                                </a>
                                <!-- Modale de confirmation -->
                                <div class="modal fade" id="verticalycentered{{$k}}" tabindex="-1" aria-labelledby="confirmationModalLabel{{$k}}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header text-white p-2 px-4">
                                                <h6 class="modal-title" id="confirmationModalLabel{{$k}}">Confirmez-vous cette suppression !</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body d-flex flex-column align-items-center gap-2">
                                                <i class="fa fa-warning text-danger fs-1"></i>
                                                <b>Etes-vous sûr de vouloir supprimer ?</b>
                                            </div>
                                            <div class="modal-footer">
                                                <a wire:click="destroy({{ $partage->id }})" class="btn btn-danger text-white">Oui, je confirme !</a>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>                             
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Aucun fichier partagé pour le moment.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
