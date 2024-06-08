 <!-- Modification montants -->
 <div class="modal fade " id="smallModal2" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-card-modal">
                <h3 class="modal-title">Modification du montant à payer</h3>
                <button type="button" class="bg-btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('billeterie.parametre.update', $naturerecu) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="row">
                            <div class="col">
                                <label for="nature" class="label-control label-text"></label>
                                <input type="text" name="nature" id="nature" value="{{ old('nature', $naturerecu->nature) }}" class="form-control border-input" placeholder="Ex: Attestation...ou legalisation ou réléve">
                                @error('nature')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('billeterie.parametre.index') }}" class="btn btn-danger ms-4 py-2"><i class="fa fa-undo me-2"></i>Retour</a>
                                <button type="submit" class="btn-modal py-2"><i class="fa fa-check me-2"></i>Modifier</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> <!-- Fin ajout montant-->