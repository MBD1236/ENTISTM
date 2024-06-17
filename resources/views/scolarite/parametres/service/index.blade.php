@extends('layouts.template-scolarite')

@section('title', 'Liste des services')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif


<div class="card mt-2">
    <div class="card-header card-head">
        <h1 class="bg-card text-center text-white card-head"><i class="fa fa-desktop me-3"></i>List des services de l'IST de Mamou</h1>
    </div>
    <div class="card-body py-4 px-2">
        <div class="d-flex flex-row justify-content-end mb-2">
            <div class="mb-3">
                <a href="{{ route('scolarite.service.create') }}" class="btn-modal">
                    <i class="bi bi-plus fs-6 fw-bold"></i>
                    <span>Ajouter un nouveau service</span>
                </a>
            </div>
        </div>
        <div class="table-responsive-sm">
            <table class="table table-hover table-bordered mb-0">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Matricule</th>
                        <th>Prénom et Nom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Service </th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $k => $service )
                    <tr>
                        <th>{{ $k+1 }}</th>
                        <td>{{ $service->matricule }}</td>
                        <td>{{ $service->nom }}</td>
                        <td>{{ $service->email }}</td>
                        <td>{{ $service->telephone }}</td>
                        <td>{{ $service->nomservice }}</td>
                        <td class="d-flex gap-1 justify-content-end align-items-center ">
                            <a href="{{ route('scolarite.service.edit', $service) }}" class="btn btn-modal p-1 px-2"><i class="bi bi-pencil-square fs-5"></i></a>
                            <!-- Bouton pour déclencher le modal de confirmation -->
                            <a href="" type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered{{$k}}">
                                <i class="bi bi-trash cdanger"></i>
                            </a>
                            <!-- Modale de confirmation -->
                            <div class="modal fade" id="verticalycentered{{$k}}" tabindex="-1" aria-labelledby="confirmationModalLabel{{$k}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header bg-card text-white p-2 px-4">
                                        <h6 class="modal-title fs-5" id="confirmationModalLabel{{$k}}">Confirmez-vous cette suppression !</h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>       
                                    </div>
                                    <div class="modal-body d-flex flex-column align-items-center gap-2">
                                        <i class="fa fa-warning text-danger fs-1"></i>
                                        <b>Etes-vous sûr de vouloir supprimer ce service?</b>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" style="background: #120a5c">Non</button>
                                        <!-- Formulaire de suppression -->
                                        <form action="{{ route('scolarite.service.destroy', $service)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Oui</button>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div><!-- End Vertically centered Modal-->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div> <!-- end table-responsive-->

    </div> <!-- end card body-->
    <div class="card-footer mt-1">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <ul class="pagination-rounded">
                    {{$services->links()}}
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
