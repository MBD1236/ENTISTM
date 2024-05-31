<div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
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
        <div class="card-header card-head mb-2">
            <h1 class="bg-card text-center text-white card-head">
                <i class="bi bi-calendar-check-fill me-3"></i>
                Les emplois du temps des differentes promotions
            </h1>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="d-flex flex-row justify-content-end px-2">
                    <a href="{{ route('genieinfo.emploitemps.import') }}" class="btn-modal">
                        <i class="fa fa-file me-1"></i>
                        <span>Importer un nouvel Emplois du Temps</span>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-12 mb-2">
                    <div class="form-group">
                        <select wire:model.live="annee_universitaire_id" name="annee_universitaire_id" class="select2 form-select border-input @error('annee_universitaire_id') is-invalid @enderror" id="annee_universitaire_id">
                            <option value="0">Année Universitaire</option>
                            @foreach ($annee_universitaires as $annee_universitaire)
                                <option value="{{ $annee_universitaire->id }}" wire:key="{{ $annee_universitaire->id }}">{{ $annee_universitaire->session }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">@error('annee_universitaire_id') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 mb-2">
                    <div class="form-group">
                        <select wire:model.live="promotion_id" name="promotion_id" id="promotion_id" class="form-select border-input @error('promotion_id') is-invalid @enderror" type="search" style="height: 40px;">
                            <option value="0">Promotions</option>
                            @foreach ($promotions as $promotion)
                                <option value="{{ $promotion->id }}" wire:key="{{ $promotion->id }}">{{ $promotion->promotion }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">@error('promotion_id') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 mb-2">
                    <div class="form-group">
                        <select wire:model.live="semestre_id" name="semestre_id" id="semestre_id" class="form-select border-input @error('semestre_id') is-invalid @enderror" type="search" style="height: 40px;">
                            <option value="0">Semestres</option>
                            @foreach ($semestres as $semestre)
                                <option value="{{ $semestre->id }}" wire:key="{{ $semestre->id }}">{{ $semestre->semestre }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">@error('semestre_id') {{ $message }} @enderror</div>
                    </div>
                </div>
            </div>
            <div class="table-responsive-sm">
                <table id="tableau" class="table table-hover table-centered table-bordered mb-0 mt-4">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Jour</th>
                            <th>Horaire</th>
                            <th>Professeurs</th>
                            <th>Salle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($emploisTemps as $k => $emploisTemp)
                            <tr wire:key="{{ $emploisTemp->id }}">
                                <td class="fw-bold">{{ $k + 1 }}</td>
                                <td class="fw-bold">{{ $emploisTemp->jour }}</td>
                                <td>{{ $emploisTemp->horaire }}</td>
                                <td>{{ $emploisTemp->enseignant->prenom }} {{ $emploisTemp->enseignant->nom }}</td>
                                <td class="fw-bold">{{ $emploisTemp->salle }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="alert alert-light bg-border text-center fw-bold">Aucune donnée ne correspond à votre recherche !</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer mt-1">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <ul class="pagination-rounded">
                        {{ $emploisTemps->links('vendor.livewire.bootstrap') }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
