@extends('layouts.template-front-office-back')
    @section('content')
        <div class="card">
            <div class="card-header card-head">
                <h1 class="bg-card text-center text-white card-head"><i class="fa fa-comment me-1"></i>Les Témoignages Publiés</h1>
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
                                <th class="text-center bg-light">Photo</th>
                                <th class="text-center bg-light">Fonction</th>
                                <th class="text-center bg-light">Témoignage</th>
                                <th class="text-center bg-light">Date</th>
                                <th class="text-center bg-light">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($temoignages as $key => $temoignage)
                                <tr>
                                    <td class="text-center">{{ $key + 1}}</td>
                                    <td class="text-center">{{$temoignage->prenom}}</td>
                                    <td class="text-center">{{$temoignage->nom}}</td>
                                    <td class="text-center">
                                        @if($temoignage->image_path)
                                            <img class="img-fluid " style="max-height: 70px; max-width: 70px;" src="{{ Storage::url($temoignage->image_path) }}" alt="Image du témoignage">
                                        @else
                                            <img class="img-fluid " style="max-height: 70px; max-width: 70px;" src="{{ asset('assets/img/téléchargement.png') }}" alt="Image du témoignage">
                                        @endif
                                    </td>
                                    <td class="text-center">{{$temoignage->fonction}}</td>
                                    <td class="text-center">{{$temoignage->texte}}</td>
                                    <td class="text-center">{{ \Carbon\Carbon::parse($temoignage->created_at)->locale('fr')->isoFormat('LLLL') }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('temoignages.edit', $temoignage->id) }}"><i class="fa fa-edit btn-color-primary"></i></a>
                                        <a href="{{ route('temoignages.delete', $temoignage->id) }}" data-bs-toggle="modal" data-bs-target="#verticalycentered1{{ $temoignage->id }}"><i class="fa fa-trash text-danger"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="2" class="text-center"><p class="">Aucun témoignage !</p></td>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        <footer class="card-footer">
                            {{ $temoignages->links() }}
                        </footer>
                    </div>
                    <!-- Suppression article-->
                    @foreach ($temoignages as $temoignage)
                        <div class="modal fade" id="verticalycentered1{{ $temoignage->id }}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title"><i class="fa fa-trash me-2"></i> Suppression !</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-center message-deleted">Voulez-vous vraiment effectuer la suppression du témoignage : <cite class="text-danger">{{ $temoignage->texte }} ?</cite></p>
                                        <i class="fa fa-trash icon-deleted text-danger"></i>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{ route('temoignages.delete', $temoignage->id) }}" class="btn btn-danger">Oui</a>
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
