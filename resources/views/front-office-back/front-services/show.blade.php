@extends('layouts.template-front-office-back')
    @section('content')
        <div class="card">
            <div class="card-header card-head">
                <h1 class="bg-card text-center text-white card-head"><i class="fa fa-university me-1"></i>Tous les services</h1>
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
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center bg-light">N°</th>
                                <th class="text-center bg-light">Nom du service</th>
                                <th class="text-center bg-light">Email</th>
                                <th class="text-center bg-light">Téléphone</th>
                                <th class="text-center bg-light">Description</th>
                                <th class="text-center bg-light">Image</th>
                                <th class="text-center bg-light">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($frontservices as $key => $frontservice)
                                <tr>
                                    <td class="text-center">{{ $key + 1}}</td>
                                    <td class="text-center">{{$frontservice->nomservice}}</td>
                                    <td class="text-center">{{$frontservice->email}}</td>
                                    <td class="text-center">{{$frontservice->tel}}</td>
                                    <td class="text-center">{{$frontservice->texte}}</td>
                                    <td class="text-center">
                                        @if($frontservice->image_path)
                                            <img class="img-fluid " style="max-height: 70px; max-width: 70px;" src="{{ Storage::url($frontservice->image_path) }}" alt="Image du service">
                                        @else
                                            <img class="img-fluid " style="max-height: 70px; max-width: 70px;" src="{{ asset('assets/img/téléchargement.png') }}" alt="Image du service">
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('frontservice.edit', $frontservice->id) }}"><i class="fa fa-edit btn-color-primary"></i></a>
                                        <a href="{{ route('frontservice.delete', $frontservice->id) }}" data-bs-toggle="modal" data-bs-target="#verticalycentered1{{ $frontservice->id }}"><i class="fa fa-trash text-danger"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="2" class="text-center"><p class="">Aucun service !</p></td>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        <footer class="card-footer">
                            {{ $frontservices->links() }}
                        </footer>
                    </div>
                    <!-- Suppression service-->
                    @foreach ($frontservices as $frontservice)
                        <div class="modal fade" id="verticalycentered1{{ $frontservice->id }}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title"><i class="fa fa-trash me-2"></i> Suppression !</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-center message-deleted">Voulez-vous vraiment effectuer la suppression du service {{ $frontservice->nomservice }} ?</p>
                                        <i class="fa fa-trash icon-deleted text-danger"></i>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{ route('frontservice.delete', $frontservice->id) }}" class="btn btn-danger">Oui</a>
                                        <button type="button" class="non-btn" data-bs-dismiss="modal">Non</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach<!-- Fin supression service -->
                </div>
            </div>
        </div>
    @endsection
