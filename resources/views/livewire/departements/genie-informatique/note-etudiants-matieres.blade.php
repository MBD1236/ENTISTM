<div>
  
    <div class="card">
        <div class="card-header card-head">
            <h1 class="bg-card text-center text-white card-head"><i class="bi bi-journal-richtext me-3"></i>Liste des notes par matière</h1>
        </div>
        <form action="" wire:submit.prevent='afficherNotes'>
            <div class="row">
                <div class="col-md-1">

                </div>
                <div class="col-md-4">
                    <select wire:model="niveau_id" id="niveau_id" class="form-select @error('matiere_id') is-invalid @enderror">
                        <option value="0">Selectionner un niveau</option>
                        @foreach ($niveaux as $niveau)
                            <option value="{{ $niveau->id }}" wire:key="{{ $niveau->id }}">{{ $niveau->niveau }}</option>
                        @endforeach
                    </select>

                </div>

                <div class="col-md-4">
                    <select wire:model="matiere_id" id="matiere_id" class="form-select @error('matiere_id') is-invalid @enderror">
                        <option value="0">Selectionner la matiere</option>
                        @foreach ($matieres as $matiere)
                            <option value="{{ $matiere->id }}" wire:key="{{ $matiere->id }}">{{ $matiere->matiere }}</option>
                        @endforeach
                    </select>
                </div>
                    
                <div class="col-md-2">
                    <button type="submit" class="btn-modal" style="height:40px; text-align:center; padding:0 5px 5px 5px"><i class="fa fa-eye me-2 mt-2"></i>Afficher</button>
                </div>
            </div>

        </form>

       <div class="card-body">
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
                            </tr>
                        @empty
                            <tr>
                            <td colspan="9">
                                    <div class="alert alert-info text-center fw-bold">Aucune donnée à afficher !</div>
                            </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
       </div>
    </div>

</div>
