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
            <div class="col-md-4 mt-2">
                <a href="{{ route('teb.matiere.ajout') }}" type="btn" class="btn-modal">Enregistrer une nouvelle matière</a>
            </div>
        </div>

       <div class="card-body">
            <div class="">
                @if(session()->has('success'))
                    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                        <h5 class="text-center">{{ session('success') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <i class="fa fa-check icon-deleted text-white"></i>
                    </div>
                @endif
            </div>
            <div class="table-responsive-sm">
                <table id="tableau" class="table table-hover table-centered table-bordered mb-0 mt-4">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Matière</th>
                            <th>Semestre</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($matieres as $k => $matiere)
                            <tr wire:key="{{ $matiere->id }}">
                                <td class="fw-bold">{{ $k+1 }}</td>
                                <td>{{ $matiere->matiere }}</td>
                                <td>{{ $matiere->semestre->semestre }}</td>
                                <td class="">
                                    <a href="{{ route('teb.matiere.edit', $matiere) }}"><i class="fa fa-edit btn-color-primary"></i></a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#verticalycentered2{{ $matiere->id }}" wire:click='delete({{ $matiere->id }})' wire:confirm="Est ce que vous voulez supprimé cette matière ?""><i class="fa fa-trash text-danger"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
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
