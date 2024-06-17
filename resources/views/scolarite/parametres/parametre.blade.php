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
            {{-- message d'erreur ou de success --}}
            <div class="row px-4">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                @if(session('danger'))
                    <div class="alert alert-danger">
                        {{session('danger')}}
                    </div>
                @endif
            </div>           
            {{-- fin --}}
            <div class="row">
                <div class="col-md-3 bg-card-button">
                    <a class="bg-card-button-a" data-bs-toggle="modal" data-bs-target="#smallModal1">
                        <h4 class="text-center bg-card-button-a"><i class="fa fa-calendar"></i><br>Sessions</h4>
                    </a>
                </div>
                <div class="col-md-3 bg-card-button">
                    <a class="bg-card-button-a" data-bs-toggle="modal" data-bs-target="#smallModal2">
                        <h4 class="text-center bg-card-button-a"><i class="fa fa-graduation-cap"></i><br>Promotions</h4>
                    </a>
                </div>
                <div class="col-md-3 bg-card-button">
                    <a class="bg-card-button-a" data-bs-toggle="modal" data-bs-target="#smallModal3">
                        <h4 class="text-center bg-card-button-a"><i class="fa fa-clone"></i><br>Semestres</h4>
                    </a>
                </div>
                <div class="col-md-3 bg-card-button px-1">
                    <a class="bg-card-button-a" data-bs-toggle="modal" data-bs-target="#smallModal4">
                        <h5 class="text-center bg-card-button-a d-flex flex-column gap-2 p-0">
                            <i class="bi bi-layout-text-window-reverse"></i>
                            <span>Type d'attestation</span>
                        </h5>
                    </a>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-3">
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
                                        <a href="{{ route('scolarite.session.edit', $anneeUniv->id) }}"><i class="fa fa-edit btn-color-primary"></i></a>
                                        <a href="{{ route('scolarite.session.delete', $anneeUniv->id) }}" data-bs-toggle="modal" data-bs-target="#verticalycentered1{{ $anneeUniv->id }}"><i class="fa fa-trash text-danger"></i></a>
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
                <div class="col-md-3">
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
                                        <a href="{{ route('scolarite.promotion.edit', $promotion->id) }}"><i class="fa fa-edit btn-color-primary"></i></a>
                                        <a href="{{ route('scolarite.promotion.delete', $promotion->id) }}" data-bs-toggle="modal" data-bs-target="#verticalycentered2{{ $promotion->id }}"><i class="fa fa-trash text-danger"></i></a>
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
                <div class="col-md-3">
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
                                        <a href="{{ route('scolarite.semestre.edit', $semestre->id) }}"><i class="fa fa-edit btn-color-primary"></i></a>
                                        <a href="{{ route('scolarite.semestre.delete', $semestre->id) }}" data-bs-toggle="modal" data-bs-target="#verticalycentered3{{ $semestre->id }}"><i class="fa fa-trash text-danger"></i></a>
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
                <div class="col-md-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center bg-light">Type d'attestation</th>
                                <th class="text-center bg-light">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($attestationTypes as $attestationType)
                                <tr>
                                    <td class="">{{ ucwords(strtolower($attestationType->type)) }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('scolarite.attestationType.edit', $attestationType->id) }}"><i class="fa fa-edit btn-color-primary"></i></a>
                                        <a href="{{ route('scolarite.attestationType.destroy', $attestationType->id) }}" data-bs-toggle="modal" data-bs-target="#verticalycentered4{{ $attestationType->id }}"><i class="fa fa-trash text-danger"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="2" class="text-center"><p class="">Aucun type attestation !</p></td>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        <footer class="card-footer">
                            {{ $attestationTypes->links() }}
                        </footer>
                    </div>
                </div>
            </div>
            <!-- Ajout sesion -->
            <div class="modal fade" id="smallModal1" tabindex="-1">
                <div class="modal-dialog modal-md">
                    <div class="modal-content row">
                        <div class="modal-header bg-card-modal">
                            <h4 class="modal-title">Ajout d'une session</h4>
                            <button type="button" class="bg-btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('scolarite.session.store') }}" method="POST">
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
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header bg-card-modal">
                            <h4 class="modal-title">Ajout d'une promotion</h4>
                            <button type="button" class="bg-btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('scolarite.promotion.store') }}" method="POST">
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
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header bg-card-modal">
                            <h4 class="modal-title">Ajout d'un semestre</h4>
                            <button type="button" class="bg-btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('scolarite.semestre.store') }}" method="POST">
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
             <!-- Ajout type d'attestation -->
            <div class="modal fade" id="smallModal4" tabindex="-1">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header bg-card-modal">
                            <h4 class="modal-title">Ajout d'un autre type</h4>
                            <button type="button" class="bg-btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('scolarite.attestationType.store') }}" method="POST">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input class="form-control border-input @error('type') is-invalid  @enderror" type="text" name="type" id="floatingtype" placeholder="type" value="{{ old('semestre') }}">
                                            <label for="floatingtype" class="label-control label-text">Type d'attestation</label>  
                                            <div class="invalid-feedback">@error('type') {{ $message }} @enderror</div>
                                        </div>
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
                                <h5 class="modal-title"><i class="fa fa-trash me-2"></i> Confirmez la suppression !!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="text-center message-deleted">Voulez-vous vraiment effectuer la suppression de la session {{ $anneeUniv->session }} ?</p>
                                <i class="fa fa-trash icon-deleted text-danger"></i>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('scolarite.session.delete', $anneeUniv->id) }}" class="btn btn-danger">Oui</a>
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
                                <h5 class="modal-title"><i class="fa fa-trash me-2"></i> Confirmez la suppression !!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="text-center message-deleted">Voulez-vous vraiment effectuer la suppression de la {{ $promotion->promotion }} ?</p>
                                <i class="fa fa-trash icon-deleted text-danger"></i>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('scolarite.promotion.delete', $promotion->id) }}" class="btn btn-danger">Oui</a>
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
                                <h5 class="modal-title"><i class="fa fa-trash me-2"></i> Confirmez la suppression !!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="text-center message-deleted">Voulez-vous vraiment effectuer la suppression du {{ $semestre->semestre }} ?</p>
                                <i class="fa fa-trash icon-deleted text-danger"></i>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('scolarite.semestre.delete', $semestre->id) }}" class="btn btn-danger">Oui</a>
                                <button type="button" class="non-btn" data-bs-dismiss="modal">Non</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach<!-- Fin supression semestre -->
             <!-- Suppression attestation type-->
            @foreach ($attestationTypes as $attestationType)
                <div class="modal fade" id="verticalycentered4{{ $attestationType->id }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title"><i class="fa fa-trash me-2"></i>Confirmez la suppression !!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="text-center message-deleted">Voulez-vous vraiment effectuer la suppression du {{ $attestationType->type }} ???</p>
                                <i class="fa fa-trash icon-deleted text-danger"></i>
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('scolarite.attestationType.destroy', $attestationType)}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Oui</button>
                                </form>
                                {{-- <a href="{{ route('scolarite.attestationType.destroy', $attestationType->id) }}" class="btn btn-danger">Oui</a> --}}
                                <button type="button" class="non-btn" data-bs-dismiss="modal">Non</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach<!-- Fin supression attestation type -->
        </div>
    </div>
@endsection
