<div class="card">
   
    <div class="card-header card-head">
        <h1 class="bg-card text-center text-white card-head"><i class="fa fa-book me-1"></i>Mes cours</h1>
        
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
                {{-- @dd($cours) --}}
                @forelse ($cours as $k => $c)
                <tr>
                    <td class="fw-bold">{{ $k+1 }}</td>
                    <td>{{ $c->cour->titre }}</td>
                    <td>{{ $c->programme->programme }}</td>
                    <td>{{ $c->niveau->niveau }}</td>
                    <td>{{ $c->promotion->promotion }}</td>
                    <td class="">
                        <a href="{{ route('etudiant.voir.cours', $c) }}" class="me-1" title="Voir le cours"><i class="fs-5 fa fa-eye btn-color-primary"></i></a>
                        @php
                            $d = $devoirs->whereIn('publication_id', $c->id)->first();
                        @endphp

                        @if($d)
                            <a href="{{ route('etudiant.voir.devoir', $d) }}" class="me-1" title="Voir le devoir">Voir devoir</a>
                        @endif
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



