<div class="card">
    <div class="card-header card-head">
        <h1 class="bg-card text-center text-white card-head"><i class="fa fa-users me-2"></i>Liste des réléves de notes des étudiants</h1>
    </div>
    <div class="row">
        <div class="col-5"></div>
        <div class="col-7">
            <form method="get" action="{{ route('scolarite.releve.create') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6 my-4">
                        <div class="form-group">
                            <select id="etudiant" class="select2 custom-select2 form-control @error('etudiant') is-invalid @enderror" name="etudiant">
                                <option value="">Rechercher le matricule et verifier </option>
                                @foreach($etudiants as $etudiant)
                                    <option value="{{ $etudiant->id }}">{{ $etudiant->ine }}</option>
                                @endforeach
                            </select>
                            @error('etudiant')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <button type="submit" class="text-white fs-5 px-4 py-2 rounded" style="background: #120a5c">
                            <i class="fa fa-plus me-2" ></i>
                            Générer un relevé
                        </button>
                    </div>
                </div>
            </form> 
        </div> 
    </div>
    <div class="card-body">
        <div class="row mt-3">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>N° Reff</th>
                        <th>INE</th>
                        <th>Prénoms</th>
                        <th>Nom</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @forelse ($etudiants as $k => $etudiant)
                    <tr>
                        <td>{{ $k+1 }}</td>
                        <td>{{ $etudiant->ine }}</td>
                        <td>{{ $etudiant->ine }}</td>
                        <td>{{ $etudiant->prenom }}</td>
                        <td>{{ $etudiant->nom }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">
                            <div class="alert bg-card text-center fw-bold text-white fs-4">Aucune donnée ne correspond à cette recherche !</div>
                        </td>
                    </tr>
                    @endforelse --}}
                </tbody>
            </table>
        </div>
    </div>
</div>


<script>
    // pour l'initialisation de select2
    $(document).ready(function() {
        $('.select2').select2({
            // placeholder: 'Sélectionner le programme',
            allowClear: true 
        });
    });
</script>