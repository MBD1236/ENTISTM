@extends('layouts.template-front-office-back')
    @section('content')
        <div class="card">
            <div class="card-header card-head">
                <h1 class="bg-card text-center text-white card-head"><i class="fa fa-book me-1"></i>Les Articles Publiés</h1>
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
                                <th class="text-center bg-light">Titre</th>
                                <th class="text-center bg-light">Description</th>
                                <th class="text-center bg-light">Date de publication</th>
                                <th class="text-center bg-light">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($articles as $key => $article)
                                <tr>
                                    <td class="text-center">{{ $key + 1}}</td>
                                    <td class="text-center">{{$article->titre}}</td>
                                    <td class="text-center">{{$article->description}}</td>
                                    <td class="text-center">{{$article->created_at}}</td>
                                    <td class="text-center">
                                        <a href="{{ route('articles.edit', $article->id) }}"><i class="fa fa-edit btn-color-primary"></i></a>
                                        <a href="{{ route('articles.delete', $article->id) }}" data-bs-toggle="modal" data-bs-target="#verticalycentered1{{ $article->id }}"><i class="fa fa-trash text-danger"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="2" class="text-center"><p class="">Aucun article !</p></td>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        <footer class="card-footer">
                            {{ $articles->links() }}
                        </footer>
                    </div>
                    <!-- Suppression article-->
                    @foreach ($articles as $article)
                        <div class="modal fade" id="verticalycentered1{{ $article->id }}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title"><i class="fa fa-trash me-2"></i> Confirmez la suppression !!</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-center message-deleted">Voulez-vous vraiment effectuer la suppression de l'article {{ $article->titre }} ?</p>
                                        <i class="fa fa-trash icon-deleted text-danger"></i>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{ route('articles.delete', $article->id) }}" class="btn btn-danger">Oui</a>
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
