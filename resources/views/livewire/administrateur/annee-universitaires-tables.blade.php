<div>

    <div class="card-header card-head">
        <h1 class="bg-card text-center text-white card-head"><i class="fa fa-book me-1"></i>La liste des années universitaires</h1>
    </div>
    <div class="card">
        <div class="card-header">
                    <div class="mt-2">
                        @if(session()->has('successDelete'))
                            <div class="alert alert-success">
                                {{ session('successDelete') }}
                            </div>
                        @endif
                    </div>
                    <div class="mt-2">
                        @if(session()->has('errorDelete'))
                            <div class="alert alert-danger">
                                {{ session('errorDelete') }}
                            </div>
                        @endif
                    </div>

                    <div class="text-end">
                        
                        <div class="">
                            <a type="button" class="btn-modal" data-bs-toggle="modal" data-bs-target="#ajoutDepartements">
                                Ajouter une année universitaire
                            </a>
                        </div>
                    </div>

                {{-- Modal pour l'ajout d'un departement --}}
                <div class="modal fade" id="ajoutDepartements" tabindex="-1" wire:ignore.self>
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header bg-card-modal">
                                <h3 class="modal-title">Ajout d'une année universitaire</h3>
                                <button type="button" class="bg-btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                            </div>
                            <div class="modal-body">
                                <form action="" enctype="multipart/form-data">
                                    <div class="mt-2">
                                        @if(session()->has('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="type" class="label-control label-text">Année Universitaire<span class="text-danger">*</span></label>
                                            <input type="text" id="session"  class="form-control border-input @error('session') is-invalid @enderror" placeholder="Année Universitaire" wire:model='session' wire:click='resetError'>
                                            <div class="invalid-feedback">@error('session') {{ $message }} @enderror</div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" wire:click.prevent='store' class="btn-modal"><i class="fa fa-check me-1"></i>Enregistrer</button>
                                            <button type="button" class=" btn-fermer bg-danger text-white" data-bs-dismiss="modal"><i class="fa fa-times me-1"></i>Fermer</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Modal pour la modification d'un cours --}}
                <div class="modal fade" id="modifDepartements" tabindex="-1" wire:ignore.self>
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header bg-card-modal">
                                <h3 class="modal-title">Modification d'une année universitaire</h3>
                                <button type="button" class="bg-btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                            </div>
                            <div class="modal-body">
                                <form action="" enctype="multipart/form-data">
                                    <div class="mt-2">
                                        @if(session()->has('successUpdate'))
                                            <div class="alert alert-success">
                                                {{ session('successUpdate') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="type" class="label-control label-text">Session<span class="text-danger">*</span></label>
                                            <input type="text" id="session"  class="form-control border-input @error('session') is-invalid @enderror" placeholder="Session" wire:model='session' wire:click='resetError'>
                                            <div class="invalid-feedback">@error('session') {{ $message }} @enderror</div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" wire:click.prevent='update' class="btn-modal"><i class="fa fa-check me-1"></i>Modifier</button>
                                            <button type="button" class=" btn-fermer bg-danger text-white" data-bs-dismiss="modal"><i class="fa fa-times me-1"></i>Fermer</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
        <div class="card-body">
            <div class="row table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Année Universitaire</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $anneeuniversitaires as $k => $au)
                        <tr>
                            <th>{{ $k+1 }}</th>
                            <th>{{ $au->session }}</th>
                            <td class="">
                                <a type="button" title="Modifier" class="fs-5 me-1" wire:click='edit({{ $au }})' data-bs-toggle="modal" data-bs-target="#modifDepartements"><i class="fa fa-edit btn-color-primary"></i></a>                               
                                <a class="me-1" href="" title="Supprimer" wire:click='delete({{ $au }})' wire:confirm="Est ce que vous voulez supprimé cette année universitaire ?"><i class="fs-5 fa fa-trash text-danger"></i></a>
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
        </div>

        <div class="card-footer mt-1">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <ul class="pagination-rounded">
                        {{$anneeuniversitaires->links('vendor.livewire.bootstrap')}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

