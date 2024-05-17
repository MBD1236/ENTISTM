@extends('layouts.template-scolarite')

@section('content')
    <div class="card">
        <div class="card-header card-head">
            <h3 class="bg-card text-white card-head py-3 d-flex flex-row justify-content-between">
                <div> 
                    <i class="fa fa-list me-2"></i>
                    <span>Les types d'attestation</span>
                </div>
                <div>
                    <a href="{{ route('scolarite.attestationType.create')}}" class="btn-modal pb-2 pt-1 ">
                        <i class="fa fa-plus me-1"></i>
                        <span>Add a new type</span>
                    </a>
                </div>
            </h3>
        </div>

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

        <div class="card">
            <div class="card-body">
                <div class="row mt-4">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Types d'attestation</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                
                        <tbody>
                        @foreach ($attestationTypes as $k => $attestationType)
                             <tr>
                                <td>{{$k+1}} </td>
                                <td>{{$attestationType->type}} </td>
                                <td class="p-1 d-flex gap-1 justify-content-end ">
                                    <a href="{{ route('scolarite.attestationType.edit', $attestationType) }}" ><i class="bi bi-pencil-square cprimary"></i></a>
                                    
                                    <!-- Bouton pour déclencher le modal de confirmation -->
                                    <a href="" type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered{{$k}}">
                                        <i class="bi bi-trash cdanger"></i>
                                    </a>
                                    <!-- Modale de confirmation -->
                                    <div class="modal fade" id="verticalycentered{{$k}}" tabindex="-1" aria-labelledby="confirmationModalLabel{{$k}}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                          <div class="modal-content">
                                            <div class="modal-header  text-white p-2 px-4">
                                                <h6 class="modal-title" id="confirmationModalLabel{{$k}}">Confirmez-vous cette suppression !</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>       
                                            </div>
                                            <div class="modal-body d-flex flex-column align-items-center gap-2">
                                                <i class="fa fa-warning text-danger fs-1"></i>
                                                <b>Etes-vous sûr de vouloir supprimer <i class="fa fa-trash cdanger"></i> ce type attestation ???</b>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn non text-white p-2" data-bs-dismiss="modal">Non</button>
                                               <!-- Formulaire de suppression -->
                                                <form action="{{ route('scolarite.attestationType.destroy', $attestationType)}}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger p-2">Oui</button>
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
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <ul class="pagination-rounded">
                    {{$attestationTypes->links()}}
                </ul>
            </div>
        </div>
    </div>
@endsection
