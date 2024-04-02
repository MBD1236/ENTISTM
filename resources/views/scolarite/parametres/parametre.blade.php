@extends('layouts.template-scolarite')
@section('content')
    <div class="card">
        <div class="card-header card-head">
            <h1 class="bg-card text-center text-white card-head"><i class="fa fa-cog me-1"></i>Paramètres</h1>
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
                        <h4 class="text-center bg-card-button-a"><i class="fa fa-calendar"></i><br>Sessions</h4>
                    </a>
                </div>
                <div class="col-md-4 bg-card-button">
                    <a class="bg-card-button-a" data-bs-toggle="modal" data-bs-target="#smallModal2">
                        <h4 class="text-center bg-card-button-a"><i class="fa fa-graduation-cap"></i><br>Promotions</h4>
                    </a>
                </div>
                <div class="col-md-4 bg-card-button">
                    <a class="bg-card-button-a" data-bs-toggle="modal" data-bs-target="#smallModal3">
                        <h4 class="text-center bg-card-button-a"><i class="fa fa-clone"></i><br>Semestres</h4>
                    </a>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center bg-light">Sessions</th>
                                <th class="text-center bg-light">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($anneeUnivs as $anneeUniv)
                                <tr>
                                    <td class="text-center">{{ $anneeUniv->session }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('session.edit', $anneeUniv->id) }}"><i class="fa fa-edit btn-color-primary"></i></a>
                                        <a href="{{ route('session.delete', $anneeUniv->id) }}" data-bs-toggle="modal" data-bs-target="#verticalycentered1{{ $anneeUniv->id }}"><i class="fa fa-trash text-danger"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="2" class="text-center"><p class="">Aucune session !</p></td>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        <footer class="card-footer">
                            {{ $anneeUnivs->links() }}
                        </footer>
                    </div>
                </div>
                <div class="col-md-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center bg-light">Promotions</th>
                                <th class="text-center bg-light">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($promotions as $promotion)
                                <tr>
                                    <td class="text-center">{{ $promotion->promotion }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('promotion.edit', $promotion->id) }}"><i class="fa fa-edit btn-color-primary"></i></a>
                                        <a href="{{ route('promotion.delete', $promotion->id) }}" data-bs-toggle="modal" data-bs-target="#verticalycentered2{{ $promotion->id }}"><i class="fa fa-trash text-danger"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="2" class="text-center"><p class="">Aucune promotion !</p></td>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        <footer class="card-footer">
                            {{ $promotions->links() }}
                        </footer>
                    </div>
                </div>
                <div class="col-md-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center bg-light">Semestres</th>
                                <th class="text-center bg-light">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($semestres as $semestre)
                                <tr>
                                    <td class="text-center">{{ $semestre->semestre }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('semestre.edit', $semestre->id) }}"><i class="fa fa-edit btn-color-primary"></i></a>
                                        <a href="{{ route('semestre.delete', $semestre->id) }}" data-bs-toggle="modal" data-bs-target="#verticalycentered3{{ $semestre->id }}"><i class="fa fa-trash text-danger"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="2" class="text-center"><p class="">Aucun semestre !</p></td>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        <footer class="card-footer">
                            {{ $semestres->links() }}
                        </footer>
                    </div>
                </div>
            </div>
            <!-- Ajout sesion -->
            <div class="modal fade" id="smallModal1" tabindex="-1">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header bg-card-modal">
                            <h3 class="modal-title">Ajout d'une session</h3>
                            <button type="button" class="bg-btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('session.store') }}" method="POST">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="col">
                                        <label for="session" class="label-control label-text">Session:</label>
                                        <input type="text" name="session" id="session" value="{{ old('session') }}" class="form-control border-input" placeholder="ex:2023-2024">
                                        @error('session')
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
            </div> <!-- Fin ajout session-->
            <!-- Ajout promotion -->
            <div class="modal fade" id="smallModal2" tabindex="-1">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header bg-card-modal">
                            <h3 class="modal-title">Ajout d'une promotion</h3>
                            <button type="button" class="bg-btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('promotion.store') }}" method="POST">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="col">
                                        <label for="promotion" class="label-control label-text">Promotion:</label>
                                        <input type="text" name="promotion" id="promotion" value="{{ old('promotion') }}" class="form-control border-input" placeholder="ex:Promotion 15">
                                        @error('promotion')
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
            </div> <!-- Fin ajout promotion-->
            <!-- Ajout semestre -->
            <div class="modal fade" id="smallModal3" tabindex="-1">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header bg-card-modal">
                            <h3 class="modal-title">Ajout d'un semestre</h3>
                            <button type="button" class="bg-btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('semestre.store') }}" method="POST">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="col">
                                        <label for="semestre" class="label-control label-text">Semestre:</label>
                                        <input type="text" name="semestre" id="semestre" value="{{ old('semestre') }}" class="form-control border-input" placeholder="ex:Semestre 8">
                                        @error('semestre')
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
            </div> <!-- Fin ajout semestre-->
            <!-- Suppression session-->
            @foreach ($anneeUnivs as $anneeUniv)
                <div class="modal fade" id="verticalycentered1{{ $anneeUniv->id }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title"><i class="fa fa-trash"></i> Suppression</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="text-center message-deleted">Voulez-vous vraiment effectuer la suppression de la session {{ $anneeUniv->session }} ?</p>
                                <i class="fa fa-trash icon-deleted text-danger"></i>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('session.delete', $anneeUniv->id) }}" class="btn btn-danger">Oui</a>
                                <button type="button" class="non-btn" data-bs-dismiss="modal">Non</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach<!-- Fin supression session -->
            <!-- Suppression promotion-->
            @foreach ($promotions as $promotion)
                <div class="modal fade" id="verticalycentered2{{ $promotion->id }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title"><i class="fa fa-trash"></i> Suppression</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="text-center message-deleted">Voulez-vous vraiment effectuer la suppression de la {{ $promotion->promotion }} ?</p>
                                <i class="fa fa-trash icon-deleted text-danger"></i>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('promotion.delete', $promotion->id) }}" class="btn btn-danger">Oui</a>
                                <button type="button" class="non-btn" data-bs-dismiss="modal">Non</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach<!-- Fin supression promotion -->
            <!-- Suppression semestre-->
            @foreach ($semestres as $semestre)
                <div class="modal fade" id="verticalycentered3{{ $semestre->id }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title"><i class="fa fa-trash"></i> Suppression</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="text-center message-deleted">Voulez-vous vraiment effectuer la suppression du {{ $semestre->semestre }} ?</p>
                                <i class="fa fa-trash icon-deleted text-danger"></i>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('semestre.delete', $semestre->id) }}" class="btn btn-danger">Oui</a>
                                <button type="button" class="non-btn" data-bs-dismiss="modal">Non</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach<!-- Fin supression semestre -->
        </div>
    </div>
@endsection
