<div class="card">
    <div class="card-header card-head">
        <h1 class="bg-card text-center text-white card-head"><i class="fa fa-user me-3"></i>Informations personnelles </h1>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col col-md-6">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td class="fw-bold">Matricule</td>
                            <td>{{ $etudiant->ine }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Nom</td>
                            <td>{{ $etudiant->nom }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Prénom</td>
                            <td>{{ $etudiant->prenom }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Date de naissance</td>
                            <td>{{ $etudiant->date_naissance }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Lieu de naissance</td>
                            <td>{{ $etudiant->lieu_naissance }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Père</td>
                            <td>{{ $etudiant->pere }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Mère</td>
                            <td>{{ $etudiant->mere }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Téléphone</td>
                            <td>{{ $etudiant->telephone }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Email</td>
                            <td>{{ $etudiant->email }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Ecole origine</td>
                            <td>{{ $etudiant->ecole_origine }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col col-md-6">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td class="fw-bold">Adresse</td>
                            <td>{{ $etudiant->adresse }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Pv</td>
                            <td>{{ $etudiant->pv }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Session Bac</td>
                            <td>{{ $etudiant->session }}</td> 
                        </tr>
                        <tr>
                            <td class="fw-bold">Profil</td>
                            <td>{{ $etudiant->profil }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Centre</td>
                            <td>{{ $etudiant->centre }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Tuteur</td>
                            <td>{{ $etudiant->nom_tuteur }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Téléphone tuteur</td>
                            <td>{{ $etudiant->telephone_tuteur }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Département</td>
                            <td>{{ $departement ? $departement->departement : 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Programme</td>
                            <td>{{ $etudiant->programme }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center">
                                <a href="{{ route('etudiant.documents', $etudiant) }}" class="btn btn-modal">Je visualise mes documents</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
                        