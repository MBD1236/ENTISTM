<div>
    
    @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    @if(session('danger'))
    <div class="alert alert-danger">
        {{session('danger')}}
    </div>
    @endif

    @if($errors->any())
        <ul>
        @foreach ($errors->all() as $item)
            <li>{{ $item }}</li>
        @endforeach
        </ul>
    @endif

    <div class="card">
        <div class="card-header card-head">
            <h1 class="bg-card text-center text-white card-head"><i class="bi bi-journal-richtext me-3"></i>Enrégistrement des notes</h1>
        </div>
        <form action="" wire:submit.prevent='importer' enctype="multipart/form-data">
            <div class="row mb-2">
                <div class="col-md-2">

                </div>
                <div class="col-md-4">
                    <input type="file" wire:model='fichier' class="form-control @error('fichier') is-invalid @enderror" wire:focus.live.debounce.1ms='clearStatus'>
                    <div class="invalid-feedback">@error('fichier') {{ $message }} @enderror</div>

                </div>

                <div class="col-md-3">
                    <select wire:model="matiere_id" id="matiere_id" class="form-select @error('matiere_id') is-invalid @enderror">
                        <option value="0">Selectionner la matiere</option>
                        @foreach ($matieres as $matiere)
                            <option value="{{ $matiere->id }}" wire:key="{{ $matiere->id }}">{{ $matiere->matiere }}</option>
                        @endforeach
                    </select>
                </div>
                    
                <div class="col-md-3">
                    <button type="submit" class="btn-modal" style="height:40px; text-align:center; padding:0 7px 7px 7px"><i class="fa fa-file me-2 mt-2"></i>Importer</button>
                </div>
            </div>
         
            
        </form>
    </div>

</div>
