<div class="card">
    <div class="card-header card-head">
        <h1 class="bg-card text-center text-white card-head"><i class="fa fa-graduation-cap me-1"></i>Modification de cet enregistrement</h1>
    </div>
    <div class="card-body">
       <form action="" wire:submit="update"  enctype="multipart/form-data">
            <div class="row mt-2">
                <div class="col-md-3 form-floating">
                    <div class="form-floating">
                        <input class="form-control border-input @error('matiere_id') is-invalid @enderror" type="text" wire:model="matricule" id="floatingmatricule" placeholder="Matricule" disabled>
                        <label for="floatingmatricule" class="label-control label-text">Matricule<span class="text-danger">*</span></label>
                        <div class="invalid-feedback">@error('matricule') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-md-3 form-floating">
                    <div class="form-floating">
                        <input class="form-control border-input @error('nom') is-invalid @enderror" type="text" wire:model="nom" id="floatingnom" placeholder="Nom" disabled>
                        <label for="floatingnom" class="label-control label-text">Nom<span class="text-danger">*</span></label>
                        <div class="invalid-feedback">@error('nom') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-md-3 form-floating">
                    <div class="form-floating">
                        <input class="form-control border-input @error('prenom') is-invalid @enderror" type="text" wire:model="prenom" id="floatingprenom" placeholder="Prenom" disabled>
                        <label for="floatingprenom" class="label-control label-text">Prénom<span class="text-danger">*</span></label>
                        <div class="invalid-feedback">@error('prenom') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-md-3 form-floating">
                    <div class="form-floating">
                        <input class="form-control border-input @error('matiere_id') is-invalid @enderror" type="text" wire:model="matiere_id" id="floatingmatiere_id" placeholder="Matière" disabled>
                        <label for="floatingmatiere_id" class="label-control label-text">Matière<span class="text-danger">*</span></label>
                        <div class="invalid-feedback">@error('matiere_id') {{ $message }} @enderror</div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-3 form-floating">
                    <div class="form-floating">
                        <input class="form-control border-input @error('note1') is-invalid @enderror" type="text" wire:model="note1" id="floatingnote1" placeholder="note1">
                        <label for="floatingnote1" class="label-control label-text">Note 1<span class="text-danger">*</span></label>
                        <div class="invalid-feedback">@error('note1') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-md-3 form-floating">
                    <div class="form-floating">
                        <input class="form-control border-input @error('note2') is-invalid @enderror" type="text" wire:model="note2" id="floatingnote2" placeholder="note2">
                        <label for="floatingnote2" class="label-control label-text">Note 2<span class="text-danger">*</span></label>
                        <div class="invalid-feedback">@error('note2') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-md-3 form-floating">
                    <div class="form-floating">
                        <input class="form-control border-input @error('note3') is-invalid @enderror" type="text" wire:model="note3" id="floatingnote3" placeholder="note3">
                        <label for="floatingnote3" class="label-control label-text">Note 3<span class="text-danger">*</span></label>
                        <div class="invalid-feedback">@error('note3') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-md-3 form-floating">
                    <div class="form-floating">
                        <input class="form-control border-input @error('moyenne_generale') is-invalid @enderror" type="text" wire:model="moyenne_generale" id="floatingmoyenne_generale" placeholder="moyenne_generale">
                        <label for="floatingmoyenne_generale" class="label-control label-text">Moyenne Générale<span class="text-danger">*</span></label>
                        <div class="invalid-feedback">@error('moyenne_generale') {{ $message }} @enderror</div>
                    </div>
                </div>
            </div>
            <div class="d-flex mt-2">
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

