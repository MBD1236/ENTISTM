@extends('layouts.template-front-office-back')

@section('content')
<div class="card">
    <div class="card-header card-head">
        <h1 class="bg-card text-center text-white card-head"><i class="fa fa-photo me-1"></i>Album Photos</h1>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-9">
                @if(session()->has('info'))
                    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                        <h5 class="text-center">{{ session('info') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <i class="fa fa-check icon-deleted text-white"></i>
                    </div>
                @endif
            </div>
            <div class="col-md-3 text-end">
                <form action="{{ route('photos.deleteAll') }}" method="POST" id="deleteAllForm">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger fw-bold p-2" data-bs-toggle="modal" data-bs-target="#deleteAllModal">
                        <i class="fa fa-trash me-1"></i> Vider l'album
                    </button>
                </form>  
            </div>
        </div>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center bg-light">N°</th>
                    <th class="text-center bg-light">Image</th>
                    <th class="text-center bg-light">Date d'enregistrement</th>
                    <th class="text-center bg-light">Date de modification</th>
                    <th class="text-center bg-light">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($photos as $key => $photo)
                    <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td class="text-center">
                            <img class="img-fluid" style="max-height: 100px; max-width: 100px;" src="{{ asset($photo->file_path) }}" alt="Image de l'album">
                        </td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($photo->created_at)->locale('fr')->isoFormat('LLLL') }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($photo->updated_at)->locale('fr')->isoFormat('LLLL') }}</td>
                        <td class="text-center">
                            <a href="{{ route('photos.edit', $photo->id) }}"><i class="fa fa-edit btn-color-primary"></i></a>
                            <a href="{{ route('photos.delete', $photo->id) }}" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $photo->id }}"><i class="fa fa-trash text-danger"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center"><p class="">Aucune image !</p></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div>
            <footer class="card-footer">
                {{ $photos->links() }}
            </footer>
        </div>

        <!-- Suppression photo-->
        @foreach ($photos as $photo)
            <div class="modal fade" id="deleteModal{{ $photo->id }}" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title"><i class="fa fa-trash me-2"></i> Suppression !</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center message-deleted">Voulez-vous vraiment effectuer la suppression de cette image <br> 
                                <img class="img-fluid mt-2" style="max-height: 200px; max-width: 200px;" src="{{ asset($photo->file_path) }}" alt="Image de l'album">
                            </p>
                            <i class="fa fa-trash icon-deleted text-danger"></i>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('photos.delete', $photo->id) }}" class="btn btn-danger">Oui</a>
                            <button type="button" class="non-btn" data-bs-dismiss="modal">Non</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- Fin suppression photo -->

        <!-- Suppression toutes les photos-->
        <div class="modal fade" id="deleteAllModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title"><i class="fa fa-trash me-2"></i> Suppression de toutes les photos !</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center message-deleted">Voulez-vous vraiment supprimer toutes les photos de l'album ?</p>
                        <i class="fa fa-trash icon-deleted text-danger"></i>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" onclick="document.getElementById('deleteAllForm').submit();">Oui</button>
                        <button type="button" class="non-btn" data-bs-dismiss="modal">Non</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin suppression toutes les photos -->
    </div>
</div>
@endsection