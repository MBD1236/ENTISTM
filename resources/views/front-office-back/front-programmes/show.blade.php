@extends('layouts.template-front-office-back')

@section('content')
    <div class="card">
        <div class="card-header card-head">
            <h1 class="bg-card text-center text-white card-head"><i class="fa fa-square me-1"></i>Les programmes publiés</h1>
        </div>
        <div class="card">
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
                        @if(session()->has('warning'))
                            <div class="alert alert-warning bg-warning text-dark border-0 alert-dismissible fade show" role="alert">
                                <h5 class="text-center text-white text-bold">{{ session('warning') }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <i class="fa fa-exclamation-triangle icon-deleted text-white text-bold"></i>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center bg-light">N°</th>
                            <th class="text-center bg-light">Intitulé du programme</th>
                            <th class="text-center bg-light">Type</th>
                            <th class="text-center bg-light">Durée</th>
                            <th class="text-center bg-light">Image</th>
                            <th class="text-center bg-light">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($frontprogrammes as $key => $frontprogramme)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td class="text-center">{{ $frontprogramme->intitule_programme }}</td>
                                <td class="text-center">{{ $frontprogramme->type_programme }}</td>                  
                                <td class="text-center">{{ $frontprogramme->duree }}</td>
                                <td class="text-center">
                                @if($frontprogramme->image_path)
                                    <img class="img-fluid" style="max-height: 70px; max-width: 70px;" src="{{ Storage::url($frontprogramme->image_path) }}" alt="Image du programme">
                                @else
                                    <img class="img-fluid" style="max-height: 70px; max-width: 70px;" src="{{ asset('assets/img/téléchargement.png') }}" alt="Image du programme">
                                @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('frontprogramme.edit', $frontprogramme->id) }}"><i class="fa fa-edit btn-color-primary"></i></a>
                                    <a href="{{ route('frontprogramme.delete', $frontprogramme->id) }}" data-bs-toggle="modal" data-bs-target="#verticalycentered1{{ $frontprogramme->id }}"><i class="fa fa-trash text-danger"></i></a>
                                </td>
                            </tr>
                        @empty
                            <td colspan="6" class="text-center"><p class="">Aucun programme disponible !</p></td>
                        @endforelse
                    </tbody>
                </table>
                <div>
                    <footer class="card-footer">
                        {{ $frontprogrammes->links() }}
                    </footer>
                </div>
                <!-- Suppression programme-->
                @foreach ($frontprogrammes as $frontprogramme)
                    <div class="modal fade" id="verticalycentered1{{ $frontprogramme->id }}" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title"><i class="fa fa-trash me-2"></i> Suppression !</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-center message-deleted">Voulez-vous vraiment supprimer le programme {{ $frontprogramme->intitule_programme }} ?</p>
                                    <i class="fa fa-trash icon-deleted text-danger"></i>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ route('frontprogramme.delete', $frontprogramme->id) }}" class="btn btn-danger">Oui</a>
                                    <button type="button" class="non-btn" data-bs-dismiss="modal">Non</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach<!-- Fin suppression programme -->
            </div>
        </div>
    </div>
@endsection