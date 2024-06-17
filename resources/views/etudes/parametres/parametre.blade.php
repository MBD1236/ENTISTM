@extends('layouts.template-etudes')
@section('content')
    <div class="card">
        <div class="card-header card-head">
            <h1 class="bg-card text-center text-white card-head"><i class="fa fa-cog me-3"></i>Paramètres</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    @if(session()->has('info'))
                        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                            <h5 class="text-center">{{ session('info') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <i class="fa fa-check icon-deleted text-white"></i>
                        </div>
                    @endif
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="row">
                <div class="col-md-4 bg-card-button">
                    <a class="bg-card-button-a" data-bs-toggle="modal" data-bs-target="#smallModal1">
                        <h4 class="text-center bg-card-button-a"><i class="fa fa-calendar"></i><br>Départements</h4>
                    </a>
                </div>
                <div class="col-md-4 bg-card-button">
                    <a class="bg-card-button-a" data-bs-toggle="modal" data-bs-target="#smallModal2">
                        <h4 class="text-center bg-card-button-a"><i class="fa fa-graduation-cap"></i><br>Programmes</h4>
                    </a>
                </div>
                <div class="col-md-4 bg-card-button">
                    <a class="bg-card-button-a" data-bs-toggle="modal" data-bs-target="#smallModal3">
                        <h4 class="text-center bg-card-button-a"><i class="fa fa-university"></i><br>Niveaux</h4>
                    </a>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center bg-light">Departements</th>
                                <th class="text-center bg-light">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($departements as $departement)
                                <tr>
                                    <td class="text-center">{{ $departement->departement }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('departement.edit', $departement->id) }}"><i class="fa fa-edit btn-color-primary"></i></a>
                                        <a href="{{ route('departement.delete', $departement->id) }}" data-bs-toggle="modal" data-bs-target="#verticalycentered1{{ $departement->id }}"><i class="fa fa-trash text-danger"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="2" class="text-center"><p class="">Aucun département !</p></td>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        <footer class="card-footer">
                            {{ $departements->links() }}
                        </footer>
                    </div>
                </div>
                <div class="col-md-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center bg-light">Programmes</th>
                                <th class="text-center bg-light">Departement</th>
                                <th class="text-center bg-light">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($programmes as $programme)
                                <tr>
                                    <td class="text-center">{{ $programme->programme }}</td>
                                    <td class="text-center">{{ $programme->departement->departement }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('programme.edit', $programme->id) }}"><i class="fa fa-edit btn-color-primary"></i></a>
                                        <a href="{{ route('programme.delete', $programme->id) }}" data-bs-toggle="modal" data-bs-target="#verticalycentered2{{ $programme->id }}"><i class="fa fa-trash text-danger"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="2" class="text-center"><p class="">Aucun programme !</p></td>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        <footer class="card-footer">
                            {{ $programmes->links() }}
                        </footer>
                    </div>
                </div>
                <div class="col-md-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center bg-light">Niveaux</th>
                                <th class="text-center bg-light">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($niveaux as $niveau)
                                <tr>
                                    <td class="text-center">{{ $niveau->niveau }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('niveau.edit', $niveau->id) }}"><i class="fa fa-edit btn-color-primary"></i></a>
                                        <a href="{{ route('niveau.delete', $niveau->id) }}" data-bs-toggle="modal" data-bs-target="#verticalycentered3{{ $niveau->id }}"><i class="fa fa-trash text-danger"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="2" class="text-center"><p class="">Aucun niveau !</p></td>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        <footer class="card-footer">
                            {{ $niveaux->links() }}
                        </footer>
                    </div>
                </div>
            </div>
            <!-- Ajout départements -->
            <div class="modal fade" id="smallModal1" tabindex="-1">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header bg-card-modal">
                            <h3 class="modal-title">Ajout d'un département</h3>
                            <button type="button" class="bg-btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('departement.store') }}" method="POST">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="col">
                                        <label for="departement" class="label-control label-text">Département:</label>
                                        <input type="text" name="departement" id="departement" value="{{ old('departement') }}" class="form-control border-input" placeholder="ex:Génie informatique">
                                        @error('departement')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class=" btn-fermer bg-danger text-white" data-bs-dismiss="modal"><i class="fa fa-times me-1"></i>Fermer</button>
                                        <button type="submit" class="btn-modal"><i class="fa fa-check me-1"></i>Enregistrer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- Fin ajout département-->
            <!-- Ajout programme -->
            <div class="modal fade" id="smallModal2" tabindex="-1">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header bg-card-modal">
                            <h3 class="modal-title">Ajout d'un programme</h3>
                            <button type="button" class="bg-btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('programme.store') }}" method="POST">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="col">
                                        <label for="programme" class="label-control label-text">Programme:</label>
                                        <input type="text" name="programme" id="programme" value="{{ old('programme') }}" class="form-control border-input" placeholder="ex:Génie informatique">
                                        @error('programme')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <select name="departement_id" id="floatingdepartment_id" class="mt-1 form-select border-input @error('departement_id') is-invalid @enderror">
                                            <option value="">Sélectionner un departement</option>
                                            @foreach($departements as $key => $departement)
                                                <option value="{{$departement->id}}" class="py-2">{{ $departement->departement}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class=" btn-fermer bg-danger text-white" data-bs-dismiss="modal"><i class="fa fa-times me-1"></i>Fermer</button>
                                        <button type="submit" class="btn-modal"><i class="fa fa-check me-1"></i>Enregistrer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- Fin ajout programme-->
            <!-- Ajout niveaux -->
            <div class="modal fade" id="smallModal3" tabindex="-1">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header bg-card-modal">
                            <h3 class="modal-title">Ajout d'un niveau</h3>
                            <button type="button" class="bg-btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('niveau.store') }}" method="POST">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="col">
                                        <label for="niveau" class="label-control label-text">Niveau:</label>
                                        <input type="text" name="niveau" id="niveau" value="{{ old('niveau') }}" class="form-control border-input" placeholder="ex:Licence 4">
                                        @error('niveau')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class=" btn-fermer bg-danger text-white" data-bs-dismiss="modal"><i class="fa fa-times me-1"></i>Fermer</button>
                                        <button type="submit" class="btn-modal"><i class="fa fa-check me-1"></i>Enregistrer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- Fin ajout niveau-->
            <!-- Suppression département-->
            @foreach ($departements as $departement)
                <div class="modal fade" id="verticalycentered1{{ $departement->id }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title"><i class="fa fa-trash"></i> Suppression</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="text-center message-deleted">Voulez-vous vraiment effectuer la suppression du département {{ $departement->departement }} ?</p>
                                <i class="fa fa-trash icon-deleted text-danger"></i>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('departement.delete', $departement->id) }}" class="btn btn-danger">Oui</a>
                                <button type="button" class="non-btn" data-bs-dismiss="modal">Non</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach<!-- Fin supression département -->
            <!-- Suppression programme-->
            @foreach ($programmes as $programme)
                <div class="modal fade" id="verticalycentered2{{ $programme->id }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title"><i class="fa fa-trash"></i> Suppression</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="text-center message-deleted">Voulez-vous vraiment effectuer la suppression du programme {{ $programme->programme }} ?</p>
                                <i class="fa fa-trash icon-deleted text-danger"></i>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('programme.delete', $programme->id) }}" class="btn btn-danger">Oui</a>
                                <button type="button" class="non-btn" data-bs-dismiss="modal">Non</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach<!-- Fin supression programme -->
            <!-- Suppression niveau-->
            @foreach ($niveaux as $niveau)
                <div class="modal fade" id="verticalycentered3{{ $niveau->id }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title"><i class="fa fa-trash"></i>Suppression</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="text-center message-deleted">Voulez-vous vraiment effectuer la suppression du {{ $niveau->niveau }} ?</p>
                                <i class="fa fa-trash icon-deleted text-danger"></i>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('niveau.delete', $niveau->id) }}" class="btn btn-danger">Oui</a>
                                <button type="button" class="non-btn" data-bs-dismiss="modal">Non</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach<!-- Fin supression niveau -->
        </div>
    </div>
@endsection
