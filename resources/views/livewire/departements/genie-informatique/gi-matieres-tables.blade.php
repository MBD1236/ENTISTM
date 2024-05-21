<div>
    <div class="card">
        <div class="card-header card-head">
            <h1 class="bg-card text-center text-white card-head">
                <i class="bi bi-journal-richtext me-3"></i>Liste des matières
            </h1>
        </div>
        
        <div class="row m-2">
            <div class="col-md-4">
                <select wire:model.live="semestre_id" id="semestre_id" class="form-select @error('semestre_id') is-invalid @enderror">
                    <option value="0">Sélectionner le semestre</option>
                    @foreach ($semestres as $semestre)
                        <option value="{{ $semestre->id }}" wire:key="{{ $semestre->id }}">{{ $semestre->semestre }}</option>
                    @endforeach
                </select>
            </div>
        </div>

       <div class="card-body">
            <div class="table-responsive-sm">
                <table id="tableau" class="table table-hover table-centered table-bordered mb-0 mt-4">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Matière</th>
                            <th>Semestre</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($matieres as $k => $matiere)
                            <tr wire:key="{{ $matiere->id }}">
                                <td class="fw-bold">{{ $k+1 }}</td>
                                <td>{{ $matiere->matiere }}</td>
                                <td>{{ $matiere->semestre->semestre }}</td>
                                
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">
                                    <div class="alert alert-info text-center fw-bold">Aucune donnée à afficher !</div>
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
                        {{$matieres->links('vendor.livewire.bootstrap')}}
                    </ul>
                </div>
            </div>
        </div>
</div>
