<div class="card">
   
    <div class="card-header card-head">
        <h1 class="bg-card text-center text-white card-head"><i class="fa fa-graduation-cap me-1"></i>La liste des etudiants de {{ $etudiants[0]->programme->programme}} {{ $etudiants[0]->niveau->niveau}} {{ $etudiants[0]->promotion->promotion}} </h1>
    </div>
    <div class="card-body mt-1">
        <div class="text-end mb-2">
            <button class="btn-modal" wire:click='export'>Exporter en excel</button>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Ine</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($etudiants as $k => $e)
                <tr>
                    <td class="fw-bold">{{ $k+1 }}</td>
                    <td>{{ $e->etudiant->ine }}</td>
                    <td>{{ $e->etudiant->nom }}</td>
                    <td>{{ $e->etudiant->prenom }}</td>
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


