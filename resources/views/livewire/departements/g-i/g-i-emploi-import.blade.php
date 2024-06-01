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
    <script>
        // pour l'initialisation de select2
        $(document).ready(function() {
            $('.select2').select2({
                allowClear: true 
            });
        });
    </script>

    <div class="card">
        <div class="card-header card-head">
            <h1 class="bg-card text-center text-white card-head"><i class="bi bi-calendar-check-fill me-3"></i>Importer un nouvel emploi du temps en tenant compte des critères ci-desous</h1>
        </div>
        <div class="card-body">
            <form action="" wire:submit.prevent='importer' enctype="multipart/form-data">
                <div class="row mb-2">
                    <div class="col-md-6 col-sm-12 mb-2">
                        <input type="file" wire:model='fichier' class="form-control border-input @error('fichier') is-invalid @enderror" wire:focus.live.debounce.1ms='clearStatus'>
                        <div class="invalid-feedback">@error('fichier') {{ $message }} @enderror</div>
                    </div>
                    <div class="col-md-6 col-sm-12 mb-2">
                        <div class="form-group">
                            <select wire:model="programme_id" id="programme_id" class="form-select border-input @error('programme_id') is-invalid @enderror" wire:focus.live.debounce.1ms='clearStatus'>
                                <option value="0">Selectionner un programme</option>
                                @foreach ($programmes as $programme)
                                    <option value="{{ $programme->id }}" wire:key="{{ $programme->id }}">{{ $programme->programme }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">@error('programme_id') {{ $message }} @enderror</div>        
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-12 mb-2">
                        <div class="form-group">   
                            <select wire:model="annee_universitaire_id" name="annee_universitaire_id" class="select2 form-select border-input @error('annee_universitaire_id') is-invalid  @enderror" wire:focus.live.debounce.1ms='clearStatus'>
                                <option value="0">Année Universitaire </option>
                                @foreach ($annee_universitaires as $annee_universitaire)
                                    <option value="{{ $annee_universitaire->id }}" wire:key="{{ $annee_universitaire->id }}">{{ $annee_universitaire->session }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">@error('annee_universitaire_id') {{ $message }} @enderror</div>        
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 mb-2">
                        <div class="form-group">   
                            <select wire:model="promotion_id" name="promotion_id" class="select2 form-select border-input @error('promotion_id') is-invalid  @enderror" wire:focus.live.debounce.1ms='clearStatus'>
                                <option value="0">Promotions</option>
                                @foreach ($promotions as $promotion)
                                    <option value="{{ $promotion->id }}" wire:key="{{ $promotion->id }}">{{ $promotion->promotion }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">@error('promotion_id') {{ $message }} @enderror</div>        
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 mb-2">
                        <div class="form-group">   
                            <select wire:model="semestre_id" name="semestre_id" class="form-select border-input @error('semestre_id') is-invalid  @enderror" wire:focus.live.debounce.1ms='clearStatus'>
                                <option value="0">Semestres</option>
                                @foreach ($semestres as $semestre)
                                    <option value="{{ $semestre->id }}" wire:key="{{ $semestre->id }}">{{ $semestre->semestre }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">@error('semestre_id') {{ $message }} @enderror</div>        
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 mb-2 text-end">
                        <button type="submit" class="btn-modal" style="height:40px; text-align:center; padding:0 7px 7px 7px"><i class="fa fa-file me-1 mt-2"></i>Importer maintenant</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
