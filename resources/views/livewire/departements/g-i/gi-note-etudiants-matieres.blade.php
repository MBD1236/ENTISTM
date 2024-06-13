<div>
    <div class="card">
        <div class="card-header card-head">
            <h1 class="bg-card text-center text-white card-head"><i class="bi bi-journal-richtext me-3"></i>Liste des notes par matière</h1>
            <div class="row mt-1">
                <div class="col-md-1">
                </div>
                <div class="col-md-4">
                    <select wire:model.live="niveau_id" id="niveau_id" class="form-select @error('matiere_id') is-invalid @enderror">
                        <option value="0">Selectionner un niveau</option>
                        @foreach ($niveaux as $niveau)
                            <option value="{{ $niveau->id }}" wire:key="{{ $niveau->id }}">{{ $niveau->niveau }}</option>
                        @endforeach
                    </select>
    
                </div>
    
                <div class="col-md-4">
                    <select wire:model.live="matiere_id" id="matiere_id" class="form-select @error('matiere_id') is-invalid @enderror">
                        <option value="0">Selectionner la matiere</option>
                        @foreach ($matieres as $matiere)
                            <option value="{{ $matiere->id }}" wire:key="{{ $matiere->id }}">{{ $matiere->matiere }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="text" wire:model.live='promotion' class="form-control" placeholder="Entrer la promotion">
                </div>
            </div>
        </div>
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
            <div class="table-responsive-sm">
                <table id="tableau" class="table table-hover table-centered table-bordered mb-0 mt-4">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>INE</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Matière</th>
                            <th>Note 1</th>
                            <th>Note 2</th>
                            <th>Note 3</th>
                            <th>Moyenne Générale</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($notes as $k => $note)
                            <tr wire:key="{{ $note->id }}">
                                <td class="fw-bold">{{ $k+1 }}</th>
                                <td class="fw-bold">{{ $note->inscription->etudiant->ine}}</th>
                                <td>{{ $note->inscription->etudiant->nom}}</td>
                                <td>{{ $note->inscription->etudiant->prenom}}</td>
                                <td>{{ $note->matiere->matiere}}</td>
                                <td>{{ $note->note1}}</td>
                                <td>{{ $note->note2}}</td>
                                <td>{{ $note->note3}}</td>
                                <td class="fw-bold">{{ $note->moyenne_generale}}</td>
                                <td class="text-center">
                                    <a href="{{ route('genieinfo.notes.edit', $note) }}"><i class="fa fa-edit btn-color-primary"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                            <td colspan="10">
                                <div class="alert alert-info text-center fw-bold">Aucune donnée à afficher !</div>
                            </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
       </div>
    </div>
    <div class="card-footer mt-1">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <ul class="pagination-rounded">
                    {{$notes->links('vendor.livewire.bootstrap')}}
                </ul>
            </div>
        </div>
    </div>

</div>
