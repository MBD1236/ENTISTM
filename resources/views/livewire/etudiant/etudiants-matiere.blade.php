<div>

    <div class="card-header card-head">
        <h1 class="bg-card text-center text-white card-head"><i class="fa fa-book me-1"></i>Mes matières</h1>
    </div>
    <div class="card">
        <div class="row mx-5 my-4">
            <div class="col-md-6 col-sm 12 mt-2 p-1">
                <h4 class="label-text"><i class="fa fa-filter me-1"></i>Filtrer la liste des matieres par semestre </h4>
            </div>
            <div class="col-md-6 col-sm-12 mt-2 p-1">
                <div class="form-group">
                    <select wire:model.live="semestre_id" name="semestre_id" id="semestre_id" class="form-select border-input @error('semestre_id') is-invalid @enderror" type="search" style="height: 40px;">
                        <option value="0">Selectionner un semestre </option>
                        @foreach ($semestres as $semestre)
                            <option value="{{ $semestre->id }}" wire:key="{{ $semestre->id }}">{{ $semestre->semestre }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">@error('semestre_id') {{ $message }} @enderror</div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Matieres</th>
                            <th>Semestre</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $matieres as $k => $m)
                        <tr>
                            <th>{{ $k+1 }}</th>
                            <th>{{ $m->matiere }}</th>
                            <th>{{ $m->semestre->semestre }}</th>
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
    </div>
</div>

