<div class="card">
   
    <div class="card-header card-head">
        <h1 class="bg-card text-center text-white card-head"><i class="fa fa-graduation-cap me-1"></i>La liste des devoirs</h1>
        

        {{-- Modal pour la devoir d'un devoir --}}
        <div class="modal fade" id="devoirs" tabindex="-1" wire:ignore.self>
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header bg-card-modal">
                        <h3 class="modal-title">Modification d'un devoir</h3>
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
                                <div class="col-md-12 mt-2">
                                    <label for="titre" class="label-control label-text">Titre<span class="text-danger">*</span></label>
                                    <input type="text" id="titre"  class="form-control border-input @error('titre') is-invalid @enderror" placeholder="Titre" wire:model='titre' wire:click='resetError'>
                                    <div class="invalid-feedback">@error('titre') {{ $message }} @enderror</div>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label for="publication_id" class="select-control label-text">Publication<span class="text-danger">*</span></label>
                                    <input type="text" id="publication_id"  class="form-control border-input @error('publication_id') is-invalid @enderror" placeholder="publication" wire:model='publication_id' wire:click='resetError'>
                                    <div class="invalid-feedback">@error('publication_id') {{ $message }} @enderror</div>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label for="fichier" class="label-control label-text">Fichier du devoir<span class="text-danger">*</span></label>
                                    <input type="file" id="fichier" class="form-control border-input @error('fichier') is-invalid @enderror" placeholder="Fichier" wire:model='fichier'>
                                    <div class="invalid-feedback">@error('fichier') {{ $message }} @enderror</div>
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="submit" wire:click.prevent='update' class="btn-modal"><i class="fa fa-check me-1"></i>Modifier</button>
                                    <button wire:click='resetChamps' type="button" class=" btn-fermer bg-danger text-white" data-bs-dismiss="modal"><i class="fa fa-times me-1"></i>Fermer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-2">
            @if(session()->has('successDelete'))
                <div class="alert alert-success">
                    {{ session('successDelete') }}
                </div>
            @endif
        </div>
    </div>
    <div class="card-body mt-1">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Titre</th>
                    <th>Fichier</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {{-- @dd($devoirs) --}}
                @forelse ($devoirs as $k => $d)
                <tr>
                    <td class="fw-bold">{{ $k+1 }}</td>
                    <td>{{ $d->titre }}</td>
                    <td>
                        <a href="{{ route('enseignant.voir.devoir', $d) }}" class="me-1" title="Voir"><i class="fs-5 fa fa-eye btn-color-primary"></i></a>
                    </td>
                    {{-- <td>{{ $d->fichier }}</td> --}}
                    <td class="">

                        <a class="me-1" href="" title="Modifier" wire:click='edit({{ $d }})' data-bs-toggle="modal" data-bs-target="#devoirs"><i class="fa fa-edit btn-color-primary"></i></a>
                        <a class="me-1" href="" title="Supprimer" wire:click='delete({{ $d }})' wire:confirm="Est ce que vous voulez supprimé ce cours ?"><i class="fs-5 fa fa-trash text-danger"></i></a>
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


