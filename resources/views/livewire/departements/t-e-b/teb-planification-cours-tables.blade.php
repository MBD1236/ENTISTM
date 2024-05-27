<div>
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    {{-- les filtres --}}
    <div class="card">
        <div class="card-header card-head">
            <h1 class="bg-card text-center text-white card-head">
                <i class="bi bi-body-text me-3"></i>Planification des cours
            </h1>
            <div class="row mt-3">
                <div class="col-md-3">
                    <select class="form-select" wire:model.live='niveau'>
                        <option value="0">Filtrer par niveau</option>
                        @foreach ($niveaux as $niveau)
                            <option value="{{ $niveau->id }}">{{ $niveau->niveau }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select" wire:model.live='promotion'>
                        <option value="0">Filtrer par promotion</option>
                        @foreach ($promotions as $promotion)
                            <option value="{{ $promotion->id }}">{{ $promotion->promotion }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select" wire:model.live='semestre'>
                        <option value="0">Filtrer par une semestre</option>
                        @foreach ($semestres as $sem)
                            <option value="{{ $sem->id }}" wire:key="{{ $sem->id }}">{{ $sem->semestre }}</option>
                        @endforeach
                    </select>
                </div>
    
                <div class="col-md-3">
                    <select class="form-select" wire:model.live='searchProgramme'>
                        <option value="0">Filtrer par programme</option>
                        @foreach ($programmes as $programme)
                            <option value="{{ $programme->id }}" wire:key="{{ $programme->id }}">{{ $programme->programme }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{-- ajouter une nouvelle ligne --}}
            <div class="d-flex justify-content-between mt-4">
                <button wire:click="toggleForm" class="btn-modal">Ajouter une nouvelle ligne</button>
            </div>
            <div class="table-responsive-sm">
                {{-- le tableau --}}
                <table class="table table-hover table-centered table-bordered mb-0 mt-4">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Professeurs</th>
                            <th>Matières</th>
                            <th>Programme</th>
                            <th>Niveau</th>
                            <th>Promotion</th>
                            <th>Semestre</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <!-- Formulaire d'ajout d'une nouvelle ligne (initiallement caché) -->
                        @if ($addline)
                            <tr>
                                <form action="" wire:submit.prevent='save' id="addNewLine">
                                    @csrf
                                    
                                    <td></td>
                                    <td>
                                        <select wire:model="enseignant_id" id="" class="form-select @error('enseignant_id') is-invalid @enderror">
                                            <option value="0">Enseignant</option>
                                            @foreach ($enseignants as $enseignant)
                                                <option value="{{ $enseignant->id }}" wire:key="{{ $enseignant->id }}">{{ $enseignant->prenom }} {{$enseignant->nom }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">@error('enseignant_id') {{ $message }} @enderror</div>
                                    </td>
                                    <td>
                                        <select wire:model="matiere_id" id="" class="form-select @error('matiere_id') is-invalid @enderror">
                                            <option value="0">Matière</option>
                                            @foreach ($matieres as $matiere)
                                                <option value="{{ $matiere->id }}">{{ $matiere->matiere }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">@error('matiere_id') {{ $message }} @enderror</div>
                                    </td>
                                    <td>
                                        <select wire:model="programme_id" id="" class="form-select @error('programme_id') is-invalid @enderror">
                                            <option value="0">Programme</option>
                                            @foreach ($programmes as $programme)
                                                <option value="{{ $programme->id }}" wire:key="{{ $programme->id }}">{{ $programme->programme }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">@error('programme_id') {{ $message }} @enderror</div>
                                    </td>
                                    <td>
                                        <select wire:model="niveau_id" id="" class="form-select @error('niveau_id') is-invalid @enderror">
                                            <option value="0">Niveau</option>
                                            @foreach ($niveaux as $niveau)
                                                <option value="{{ $niveau->id }}" wire:key="{{ $niveau->id }}">{{ $niveau->niveau }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">@error('programme_id') {{ $message }} @enderror</div>
                                    </td>
                                    <td>
                                        <select wire:model="promotion_id" id="" class="form-select @error('promotion_id') is-invalid @enderror">
                                            <option value="0">Promotion</option>
                                            @foreach ($promotions as $promotion)
                                                <option value="{{ $promotion->id }}" wire:key="{{ $promotion->id }}">{{ $promotion->promotion }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">@error('promotion_id') {{ $message }} @enderror</div>
                                    </td>
                                
                                    <td>
                                        <select wire:model="semestre_id" required class="form-select @error('semestre_id') is-invalid @enderror">
                                            <option value="0">Semestre</option>
                                            @foreach ($semestres as $semestre)
                                                <option value="{{ $semestre->id }}" wire:key="{{ $semestre->id }}">{{ $semestre->semestre }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">@error('semestre_id') {{ $message }} @enderror</div>
                                    </td>
                                    <td>
                                        @if ($addline)
                                            <button form="addNewLine" type="submit" class="btn btn-primary">Enregistrer</button>
                                        @endif
                                    </td>
                                </form>
                            </tr>
                        @endif
                        <!-- fin du formulaire d'ajout -->

                        {{-- @dump($planifications) --}}

                        @forelse ($planifications as $k => $planification)
                            @if ($editingId === $planification->id)
                            {{-- Debut du formulaire de modification --}}
                                <tr wire:key='{{ $planification->id }}'>
                                    <form action="" wire:submit.prevent='update' id="editNewLine">
                                        @csrf
                                        <td></td>
                                        <td>
                                            <select wire:model="enseignant_id" id="" class="form-select @error('enseignant_id') is-invalid @enderror">
                                                <option value="0">Enseignant</option>
                                                @foreach ($enseignants as $enseignant)
                                                    <option value="{{ $enseignant->id }}" wire:key="{{ $enseignant->id }}">{{ $enseignant->prenom }} {{$enseignant->nom }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">@error('enseignant_id') {{ $message }} @enderror</div>
                                        </td>
                                        <td>
                                            <select wire:model="matiere_id" id="" class="form-select @error('matiere_id') is-invalid @enderror">
                                                <option value="0">Matière</option>
                                                @foreach ($matieres as $matiere)
                                                    <option value="{{ $matiere->id }}">{{ $matiere->matiere }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">@error('matiere_id') {{ $message }} @enderror</div>
                                        </td>
                                        <td>
                                            <select wire:model="programme_id" id="" class="form-select @error('programme_id') is-invalid @enderror">
                                                <option value="0">Programme</option>
                                                @foreach ($programmes as $programme)
                                                    <option value="{{ $programme->id }}" wire:key="{{ $programme->id }}">{{ $programme->programme }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">@error('programme_id') {{ $message }} @enderror</div>
                                        </td>
                                        <td>
                                            <select wire:model="niveau_id" id="" class="form-select @error('niveau_id') is-invalid @enderror">
                                                <option value="0">Niveau</option>
                                                @foreach ($niveaux as $niveau)
                                                    <option value="{{ $niveau->id }}" wire:key="{{ $niveau->id }}">{{ $niveau->niveau }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">@error('programme_id') {{ $message }} @enderror</div>
                                        </td>
                                        <td>
                                            <select wire:model="promotion_id" id="" class="form-select @error('promotion_id') is-invalid @enderror">
                                                <option value="0">Promotion</option>
                                                @foreach ($promotions as $promotion)
                                                    <option value="{{ $promotion->id }}" wire:key="{{ $promotion->id }}">{{ $promotion->promotion }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">@error('promotion_id') {{ $message }} @enderror</div>
                                        </td>
                                    
                                        <td>
                                            <select wire:model="semestre_id" required class="form-select @error('semestre_id') is-invalid @enderror">
                                                <option value="0">Semestre</option>
                                                @foreach ($semestres as $semestre)
                                                    <option value="{{ $semestre->id }}" wire:key="{{ $semestre->id }}">{{ $semestre->semestre }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">@error('semestre_id') {{ $message }} @enderror</div>
                                        </td>
                                        <td class="d-flex gap-1 justify-content-end">
                                            <button form='editNewLine' type='submit' class="btn btn-primary p-1 py-0 fs-4"><i class="bi bi-pencil-square"></i></button>
                                            <button wire:click='cancel' class="btn btn-danger p-1 py-0 fs-4"><i class="bi bi-eraser"></i></button>
                                        </td>
                                    </form>
                                </tr>
                            {{-- fin du formulaire de modification  --}}
                            @else
                                <tr>
                                    <td>{{ $k+1}}</td>
                                    <td>{{ $planification->enseignant->prenom}} {{ $planification->enseignant->nom}}</td>
                                    <td>{{ $planification->matiere->matiere }}</td>
                                    <td>{{ $planification->programme->programme }}</td>
                                    <td>{{ $planification->niveau->niveau }}</td>
                                    <td>{{ $planification->promotion->promotion }}</td>
                                    <td>{{ $planification->semestre->semestre }}</td>
                                    <td class="d-flex gap-1 justify-content-end ">
                                        <button wire:click="edit({{ $planification->id }})" class="btn btn-primary p-1 py-0 fs-4"><i class="bi bi-pencil-square"></i></button>
                                        <button wire:click='delete({{ $planification->id }})' class="btn btn-danger p-1 py-0 fs-4"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="11">
                                    <div class="alert alert-info text-center">Aucune donnée !</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div> <!-- end table-responsive-->

        </div> <!-- end card body-->
        <div class="card-footer mt-1">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <ul class="pagination-rounded">
                        {{$planifications->links('vendor.livewire.bootstrap')}}
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>