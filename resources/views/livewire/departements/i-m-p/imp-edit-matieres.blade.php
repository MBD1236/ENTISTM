<div class="card">
    <div class="card-header card-head">
        <h1 class="bg-card text-center text-white card-head"><i class="fa fa-graduation-cap me-1"></i>Ajout de matière</h1>
    </div>
    <div class="card-body">
       <form action="" wire:submit="update">
            <div class="row mt-2">
                <div class="col-md-4 form-floating">
                    <div class="form-floating">
                        <input class="form-control border-input @error('matiere') is-invalid @enderror" type="text" wire:model="matiere" id="floatingmatiere" placeholder="Matière" wire:click='clearStatus'>
                        <label for="floatingmatiere" class="label-control label-text">Matière<span class="text-danger">*</span></label>
                        <div class="invalid-feedback">@error('matiere') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-md-4 form-floating">
                    <div class="form-floating">
                        <select class="form-select border-input @error('programme_id') is-invalid @enderror" wire:model="programme_id" id="programme_id" wire:click='clearStatus'>
                            <option value="0">Sélectioner un programme</option>
                            @foreach ($programmes as $programme)
                                <option value="{{ $programme->id }}" wire:key="{{ $programme->id }}">{{ $programme->programme }}</option>
                            @endforeach
                        </select>
                        <label for="floatingprogramme" class="label-control label-text">Programme<span class="text-danger">*</span></label>
                        <div class="invalid-feedback">@error('programme_id') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-md-4 form-floating">
                    <div class="form-floating">
                        <select class="form-select border-input @error('semestre_id') is-invalid @enderror" wire:model="semestre_id" id="semestre_id" wire:click='clearStatus'>
                            <option value="0">Sélectioner un semestre</option>
                            @foreach ($semestres as $semestre)
                                <option value="{{ $semestre->id }}" wire:key="{{ $semestre->id }}">{{ $semestre->semestre }}</option>
                            @endforeach
                        </select>
                        <label for="floatingsemestre" class="label-control label-text">Semestre<span class="text-danger">*</span></label>
                        <div class="invalid-feedback">@error('semestre_id') {{ $message }} @enderror</div>
                    </div>
                </div>
                
            </div>
            <div class="d-flex justify-content-center mt-2">
                <div class="me-2">
                    <center><button type="submit" class="btn-modal" style="height: 40px;padding:0 5px 5px 5px"><i class="fa fa-check me-2 mt-2"></i>
                        Modifier</button></center>
                </div>
                <div class="">
                    <center><button class="btn btn-danger" wire:click='cancel'><i class="fa fa-check me-2 mt-2"></i>
                        Annuler
                    </button></center>
                </div>
            </div>
            
       </form>
    </div>
</div>


