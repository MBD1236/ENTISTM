<div class="card">
   
    <div class="card-header card-head">
        <h1 class="bg-card text-center text-white card-head"><i class="fa fa-graduation-cap me-1"></i>Visualisation du devoir</h1>
    </div>
    <div class="card-body mt-1">
            @if(Str::endsWith($devoir->fichier, ['.pdf', '.PDF']))
                <embed src="{{ asset('storage/'.$devoir->fichier) }}" type="application/pdf" width="100%" height="800px">
            @else
                <video width="100%" height="100%" controls>
                    <source src="{{ asset('storage/'.$devoir->fichier) }}" type="video/{{ pathinfo($devoir->fichier, PATHINFO_EXTENSION) }}">
                </video>
            @endif
    </div>
</div>

