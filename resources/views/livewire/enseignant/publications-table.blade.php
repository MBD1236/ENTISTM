<div class="card">
   
    <div class="card-header card-head">
        <h1 class="bg-card text-center text-white card-head"><i class="fa fa-graduation-cap me-1"></i>La liste des cours publiés</h1>
        

        {{-- Modal pour la publication d'un programme --}}
        <div class="modal fade" id="publicationCours" tabindex="-1" wire:ignore.self>
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header bg-card-modal">
                        <h3 class="modal-title">Modification d'une publication</h3>
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
                                    <label for="cour_id" class="label-control label-text">Cours<span class="text-danger">*</span></label>
                                    <input type="text" id="cour_id"  class="form-control border-input @error('cour_id') is-invalid @enderror" placeholder="Cours" wire:model='cour_id' wire:click='resetError'>
                                    <div class="invalid-feedback">@error('cour_id') {{ $message }} @enderror</div>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label for="programme" class="select-control label-text">programme<span class="text-danger">*</span></label>
                                    <select class="form-select border-input @error('programme_id') is-invalid @enderror" wire:model="programme_id" id="programme_id" wire:click='resetError'>
                                        <option value="0">Sélectioner un programme</option>
                                        @foreach ($programmes as $programme)
                                            <option value="{{ $programme->id }}" wire:key="{{ $programme->id }}">{{ $programme->programme }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">@error('programme_id') {{ $message }} @enderror</div>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label for="promotion" class="label-control label-text">Promotion<span class="text-danger">*</span></label>
                                    <select class="form-select border-input @error('promotion_id') is-invalid @enderror" wire:model="promotion_id" id="promotion_id" wire:click='resetError'>
                                        <option value="">Sélectioner une promotion</option>
                                        @foreach ($promotions as $promotion)
                                            <option value="{{ $promotion->id }}" wire:key="{{ $promotion->id }}">{{ $promotion->promotion }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">@error('promotion_id') {{ $message }} @enderror</div>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label for="niveau" class="form-control label-text">Niveau<span class="text-danger">*</span></label>
                                    <select class="form-select border-input @error('niveau_id') is-invalid @enderror" wire:model="niveau_id" wire:click='resetError' id="niveau_id">
                                        <option value="0">Sélectioner un niveau</option>
                                        @foreach ($niveaux as $niveau)
                                            <option value="{{ $niveau->id }}" wire:key="{{ $niveau->id }}">{{ $niveau->niveau }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">@error('niveau_id') {{ $message }} @enderror</div>
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


         {{-- Modal pour l'ajout d'un devoir --}}
         <div class="modal fade" id="devoirs" tabindex="-1" wire:ignore.self>
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header bg-card-modal">
                        <h3 class="modal-title">Ajout d'un devoir</h3>
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
                                    <label for="publication" class="select-control label-text">Publication<span class="text-danger">*</span></label>
                                    <input type="text" id="publication_id"  class="form-control border-input @error('publication_id') is-invalid @enderror" placeholder="Publication" wire:model='publication_id' wire:click='resetError'>
                                    <div class="invalid-feedback">@error('publication_id') {{ $message }} @enderror</div>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label for="fichier" class="label-control label-text">Fichier du devoir<span class="text-danger">*</span></label>
                                    <input type="file" id="fichier" class="form-control border-input @error('fichier') is-invalid @enderror" placeholder="Fichier" wire:model='fichier'>
                                    <div class="invalid-feedback">@error('fichier') {{ $message }} @enderror</div>
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="submit" wire:click.prevent='storeDevoir' class="btn-modal"><i class="fa fa-check me-1"></i>Enregistrer</button>
                                    <button wire:click='resetChamps' type="button" class=" btn-fermer bg-danger text-white" data-bs-dismiss="modal"><i class="fa fa-times me-1"></i>Fermer</button>
                                </div>
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="card-body mt-1">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Cours</th>
                    <th>Programme</th>
                    <th>Niveau</th>
                    <th>Promotion</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {{-- @dd($publications) --}}
                @forelse ($publications as $k => $p)
                <tr>
                    <td class="fw-bold">{{ $k+1 }}</td>
                    <td>{{ $p->cour->titre }}</td>
                    <td>{{ $p->programme->programme }}</td>
                    <td>{{ $p->niveau->niveau }}</td>
                    <td>{{ $p->promotion->promotion }}</td>
                    <td class="">

                        <a class="me-1" href="" title="Modifier" wire:click='edit({{ $p }})' data-bs-toggle="modal" data-bs-target="#publicationCours"><i class="fa fa-edit btn-color-primary"></i></a>
                        <a class="me-1" href="" title="Supprimer" wire:click='delete({{ $p }})' wire:confirm="Est ce que vous voulez supprimé ce cours ?"><i class="fs-5 fa fa-trash text-danger"></i></a>
                        <a type="button" class=""  wire:click='setDevoir({{ $p->id }})' data-bs-toggle="modal" data-bs-target="#devoirs">
                            Associer a un devoir
                        </a>
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


