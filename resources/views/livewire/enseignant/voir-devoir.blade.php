<div class="card">
   
    <div class="card-header card-head">
        <h1 class="bg-card text-center text-white card-head"><i class="fa fa-graduation-cap me-1"></i>Visualisation du devoir</h1>
        <div class="mt-3 text-end">
            <a href="{{ route('enseignant.devoirs') }}" class="btn-modal">Retour</a>

        </div>
    </div>
    <div class="card-body mt-1">
            @if(Str::endsWith($devoir->fichier, ['.pdf', '.PDF']))
                <embed src="{{ asset('storage/'.$devoir->fichier) }}" type="application/pdf" width="100%" height="800px">
            @endif
    </div>
</div>