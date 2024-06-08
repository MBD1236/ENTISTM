@extends('layouts.template-front-office-back')
    @section('content')
        <div class="card">
            <div class="card-header card-head">
                <h1 class="bg-card text-center text-white card-head"><i class="fa fa-user me-1"></i>Nos profils Enseignants</h1>
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
                                <th class="text-center bg-light">Prénom</th>
                                <th class="text-center bg-light">Nom</th>
                                <th class="text-center bg-light">Cours enseignés</th>
                                <th class="text-center bg-light">Photo</th>
                                <th class="text-center bg-light">Email</th>
                                <th class="text-center bg-light">Téléphone</th>
                                <th class="text-center bg-light">Lien linkedln</th>
                                <th class="text-center bg-light">Lien facebook</th>
                                <th class="text-center bg-light">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($frontenseignants as $key => $frontenseignant)
                                <tr>
                                    <td class="text-center">{{ $key + 1}}</td>
                                    <td class="text-center">{{$frontenseignant->prenom}}</td>
                                    <td class="text-center">{{$frontenseignant->nom}}</td>
                                    <td class="text-center">{{$frontenseignant->cours}}</td>
                                    <td clas="text-center">
                                        @if($frontenseignant->image_path)
                                            <img class="img-fluid " style="max-height: 70px; max-width: 70px;" src="{{ Storage::url($frontenseignant->image_path) }}" alt="Image du témoignage">
                                        @else
                                            <img class="img-fluid " style="max-height: 70px; max-width: 70px;" src="{{ asset('assets/img/téléchargement.png') }}" alt="Image du témoignage">
                                        @endif
                                    </td>
                                    <td class="text-center">{{$frontenseignant->email}}</td>
                                    <td class="text-center">{{$frontenseignant->tel}}</td>
                                    <td class="text-center">{{$frontenseignant->link_in}}</td>
                                    <td class="text-center">{{$frontenseignant->link_fb}}</td>
                                    <td class="text-center">
                                        <a href="{{ route('frontenseignants.edit', $frontenseignant->id) }}"><i class="fa fa-edit btn-color-primary"></i></a>
                                        <a href="{{ route('frontenseignants.delete', $frontenseignant->id) }}" data-bs-toggle="modal" data-bs-target="#verticalycentered1{{ $frontenseignant->id }}"><i class="fa fa-trash text-danger"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="9" class="text-center"><p class="">Aucun profil !</p></td>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        <footer class="card-footer">
                            {{ $frontenseignants->links() }}
                        </footer>
                    </div>
                    <!-- Suppression article-->
                    @foreach ($frontenseignants as $frontenseignant)
                        <div class="modal fade" id="verticalycentered1{{ $frontenseignant->id }}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title"><i class="fa fa-trash me-2"></i> Suppression !</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-center message-deleted">Voulez-vous vraiment effectuer la suppression de ce profil ?</p>
                                        <i class="fa fa-trash icon-deleted text-danger"></i>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{ route('frontenseignants.delete', $frontenseignant->id) }}" class="btn btn-danger">Oui</a>
                                        <button type="button" class="non-btn" data-bs-dismiss="modal">Non</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach<!-- Fin supression article -->
                </div>
            </div>
        </div>
    @endsection
