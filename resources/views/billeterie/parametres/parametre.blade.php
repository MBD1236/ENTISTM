@extends('layouts.templete-guichet')
@section('content')
    <div class="card">
        <div class="card-header card-head">
            <h1 class="bg-card text-center text-white card-head"><i class="fa fa-cog me-2"></i>Paramètres</h1>
        </div>
        <div class="card-body">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
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
                    <div class="col-md-6 bg-card-button d-flex justify-content-center">
                        <a class="bg-card-button-a" data-bs-toggle="modal" data-bs-target="#smallModal1">
                            <h4 class="text-center bg-card-button-a"><i class="fa fa-book fs-1"></i><br>Ajouter un nouveau type de reçu</h4>
                        </a>
                    </div>
                    <div class="col-md-6 bg-card-button">
                        <a class="bg-card-button-a" data-bs-toggle="modal" data-bs-target="#smallModal3">
                            <h4 class="text-center bg-card-button-a"><i class="fa fa-money"></i><br>Ajouter un montant</h4>
                        </a>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center bg-light fw-bold">N°</th>
                                    <th class="text-center bg-light">Nature du reçu</th>
                                    <th class="text-center bg-light">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($naturerecus as $k => $naturerecu)
                                    <tr>
                                        <td class="text-center fw-bold">{{ $k+1 }}</td>
                                        <td>{{ $naturerecu->nature }}</td>
                                        <td class="text-center d-flex flex-row gap-2 justify-content-end ">
                                            <a href="{{ route('billeterie.parametre.edit', $naturerecu)}}"  data-bs-toggle="modal" data-bs-target="#smallModal2">
                                                <i class="fa fa-edit btn-color-primary fs-3"></i>
                                            </a>
                                            <a href="{{ route('billeterie.parametre.destroy', $naturerecu->id) }}" data-bs-toggle="modal" data-bs-target="#verticalycentered1{{ $naturerecu->id }}">
                                                <i class="fa fa-trash text-danger fs-3 "></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="3" class="text-center">Aucun montant ne se trouve dans la base de donnée !</td>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            <footer class="card-footer">
                                {{ $naturerecus->links() }}
                            </footer>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center bg-light fw-bold">N°</th>
                                    <th class="bg-light">Montants</th>
                                    <th class="text-end bg-light">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($naturerecus as $k => $naturerecu)
                                    <tr>
                                        <td class="text-center">{{ $k+1 }}</td>
                                        <td>{{ $naturerecu->nature }}</td>
                                        <td class="text-center d-flex flex-row gap-2 justify-content-end ">
                                            <a href="{{ route('billeterie.parametre.edit', $naturerecu)}}"  data-bs-toggle="modal" data-bs-target="#smallModal2">
                                                <i class="fa fa-edit btn-color-primary fs-3"></i>
                                            </a>
                                            <a href="{{ route('billeterie.parametre.destroy', $naturerecu->id) }}" data-bs-toggle="modal" data-bs-target="#verticalycentered1{{ $naturerecu->id }}">
                                                <i class="fa fa-trash text-danger fs-3 "></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="3" class="text-center">Aucun montant ne se trouve dans la base de donnée !</td>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            <footer class="card-footer">
                                {{ $naturerecus->links() }}
                            </footer>
                        </div>
                    </div>
                </div>

                <!-- Ajout montants -->
                <div class="modal fade " id="smallModal1" tabindex="-1">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header bg-card-modal">
                                <h3 class="modal-title">Ajout d'un nouveau type de reçu</h3>
                                <button type="button" class="bg-btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('billeterie.parametre.store') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <div class="col">
                                            <label for="nature" class="label-control label-text" ></label>
                                            <input type="text" name="nature" id="nature" value="{{ old('nature') }}" class="form-control border-input" placeholder="Ex: Attestation...ou legalisation ou réléve">
                                            @error('nature')<p class="text-danger">{{ $message }}</p> @enderror
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class=" btn-fermer bg-danger py-2 text-white" data-bs-dismiss="modal"><i class="fa fa-times me-2"></i>Fermer</button>
                                            <button type="submit" class="btn-modal py-2"><i class="fa fa-check me-2"></i>Enregistrer</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- Fin ajout montant-->
                <!-- Ajout départements -->
                <div class="modal fade" id="smallModal3" tabindex="-1">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header bg-card-modal">
                                <h3 class="modal-title">Ajout d'un département</h3>
                                <button type="button" class="bg-btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('billeterie.parametre.store') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <div class="col">
                                            <label for="somme" class="label-control label-text">Département:</label>
                                            <input type="text" name="somme" id="somme" value="{{ old('somme') }}" class="form-control border-input" placeholder="Ex : ....">
                                            @error('somme')
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

                <!-- Suppression département-->
                @foreach ($naturerecus as $naturerecu)
                    <div class="modal fade" id="verticalycentered1{{ $naturerecu->id }}" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title"><i class="fa fa-trash"></i> Suppression de la nuture du reçu</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-center message-deleted">Voulez-vous vraiment effectuer la suppression cette nature du reçu ?</p>
                                    <i class="fa fa-trash icon-deleted text-danger"></i>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ route('billeterie.parametre.destroy', $naturerecu->id) }}" class="btn btn-danger">Oui</a>
                                    <button type="button" class="non-btn" data-bs-dismiss="modal">Non</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach<!-- Fin supression département -->

            </div>
        </div>
    </div>
@endsection
