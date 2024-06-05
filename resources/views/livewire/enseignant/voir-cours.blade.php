<div class="card">
   
    <div class="card-header card-head">
        <h1 class="bg-card text-center text-white card-head"><i class="fa fa-graduation-cap me-1"></i>Visualisation du cours</h1>
        <div class="mt-3 text-end">
            <a href="{{ route('enseignant.cours') }}" class="btn-modal">Retour</a>

        </div>
    </div>
    <div class="card-body mt-1">
            @if(Str::endsWith($cour->contenu, ['.pdf', '.PDF']))
                <embed src="{{ asset('storage/'.$cour->contenu) }}" type="application/pdf" width="100%" height="800px">
            @else
                <video width="100%" height="100%" controls>
                    <source src="{{ asset('storage/'.$cour->contenu) }}" type="video/{{ pathinfo($cour->contenu, PATHINFO_EXTENSION) }}">
                </video>
            @endif
    </div>
</div>

