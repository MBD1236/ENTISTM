<div>
    <div class="card">
        <div class="card-header card-head">
            <h1 class="bg-card text-center text-white card-head">
                <i class="bi bi-journal-richtext me-3"></i>Liste des notes semestrielle
            </h1>
            <div class="row mt-5">
                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <select wire:model.live="departement_id" id="departement_id" class="form-select border-input @error('departement_id') is-invalid @enderror">
                        <option value="">Departement</option>
                        @foreach ($departements as $departement)
                            <option value="{{ $departement->id }}" wire:key="{{ $departement->id }}">{{ $departement->departement }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <select wire:model.live="programme_id" id="programme_id" class="form-select border-input @error('programme_id') is-invalid @enderror">
                        <option value="">Programme</option>
                        @foreach ($programmes as $programme)
                            <option value="{{ $programme->id }}" wire:key="{{ $programme->id }}">{{ $programme->programme }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <select wire:model.live="niveau_id" id="niveau_id" class="form-select border-input @error('niveau_id') is-invalid @enderror">
                        <option value="">Niveau</option>
                        @foreach ($niveaux as $niveau)
                            <option value="{{ $niveau->id }}" wire:key="{{ $niveau->id }}">{{ $niveau->niveau }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <select wire:model.live="semestre_id" id="semestre_id" class="form-select border-input @error('semestre_id') is-invalid @enderror">
                        <option value="">Semestre</option>
                        @foreach ($semestres as $semestre)
                            <option value="{{ $semestre->id }}" wire:key="{{ $semestre->id }}">{{ $semestre->semestre }}</option>
                        @endforeach
                    </select>
                </div>
    
                <div class="col-md-2">
                    <input type="text" wire:model.live.debounce.500ms='promotion' class="form-control border-input" placeholder="Entrer la promotion">
                </div>
                <div class="col-md-1"></div>

            </div>
           <div class="row">
                <div class="col-md-6 me-2"></div>
                <div class="col-md-5">
                    <div class="mt-3 me-2 d-flex flex-row">
                        <input class="form-control border-input" type="search" wire:model.live.debounce.200ms='searchE' id="searchE" placeholder="Filtrer la liste par l'INE, le nom et le prenom">
                    </div>
                </div>
           </div>
        </div>
        

       <div class="card-body">
            <div class="table-responsive-sm">
                <table id="tableau" class="table table-hover table-centered table-bordered mb-0 mt-4">
                    <thead>
                        <tr>
                            <th>N°</th>
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
                                    $noteSemestrielle = ($nombreMatieres > 0) ? number_format($totalNotes / $nombreMatieres, 2) : '-';
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
