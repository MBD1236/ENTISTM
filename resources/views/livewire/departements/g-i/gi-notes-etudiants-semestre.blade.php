<div>
    <div class="card">
        <div class="card-header card-head">
            <h1 class="bg-card text-center text-white card-head">
                <i class="bi bi-journal-richtext me-3"></i>Liste des notes semestrielle
            </h1>
            <div class="row mt-2">
                <div class="col-md-1"></div>
                <div class="col-md-4">
                    <select wire:model.live="niveau_id" id="niveau_id" class="form-select @error('niveau_id') is-invalid @enderror">
                        <option value="">Sélectionner un niveau</option>
                        @foreach ($niveaux as $niveau)
                            <option value="{{ $niveau->id }}" wire:key="{{ $niveau->id }}">{{ $niveau->niveau }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <select wire:model.live="semestre_id" id="semestre_id" class="form-select @error('semestre_id') is-invalid @enderror">
                        <option value="">Sélectionner le semestre</option>
                        @foreach ($semestres as $semestre)
                            <option value="{{ $semestre->id }}" wire:key="{{ $semestre->id }}">{{ $semestre->semestre }}</option>
                        @endforeach
                    </select>
                </div>
    
                <div class="col-md-2">
                    <input type="text" wire:model.live.debounce.1000ms='promotion' class="form-control" placeholder="Entrer la promotion">
                </div>
            </div>
        </div>
        

       <div class="card-body">
            <div class="table-responsive-sm">
                <table id="tableau" class="table table-hover table-centered table-bordered mb-0 mt-4">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>INE</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            @if ($notes !== '')
                                @foreach ($matieres as $matiere)
                                    <th>{{ $matiere->matiere }}</th>
                                @endforeach
                            @endif
                            <th>Moyenne Semestrielle</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($etudiantsinscrits as $k => $etudiant)
                            <tr wire:key="{{ $etudiant->id }}">
                                <td class="fw-bold">{{ $k+1 }}</td>
                                <td class="fw-bold">{{ $etudiant->etudiant->ine }}</td>
                                <td>{{ $etudiant->etudiant->nom }}</td>
                                <td>{{ $etudiant->etudiant->prenom }}</td>
                                @php
                                    $totalNotes = 0;
                                    $nombreMatieres = 0;
                                @endphp
                                @foreach ($matieres as $matiere)
                                    @php
                                        $noteMatiere = $notes->where('inscription_id', $etudiant->id)
                                                              ->where('matiere_id', $matiere->id)
                                                              ->pluck('moyenne_generale')
                                                              ->first();
                                        if ($noteMatiere !== null) {
                                            $totalNotes += $noteMatiere;
                                            $nombreMatieres++;
                                        }
                                    @endphp
                                    <td>{{ $noteMatiere ?? '-' }}</td>
                                @endforeach
                                @php
                                    $noteSemestrielle = ($nombreMatieres > 0) ? ($totalNotes / $nombreMatieres) : '-';
                                @endphp
                                <td class="fw-bold">{{ $noteSemestrielle }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ count($matieres) + 5 }}">
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
                        {{$etudiantsinscrits->links('vendor.livewire.bootstrap')}}
                    </ul>
                </div>
            </div>
        </div>
</div>
